<?php

namespace App\Http\Controllers\Admin;

use App\Backup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class BackupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $entries = Backup::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.settings.backup', compact('entries'));
    }

    public function store()
    {
        $string = str_random(10);
        \Spatie\DbDumper\Databases\MySql::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile('../storage/app/'.$string.'.sql');

        $backup = new Backup();
        $backup->name = $string.'.sql';
        $backup->save();

        activity()->log("New backup <b>{$backup->name}</b> has been created");

        return redirect('admin/settings/backup')->with('info', 'Backup successfully created');
    }

    public function get($name)
    {
        $entry = Backup::where('name', '=', $name)->firstOrFail();
        $file = Storage::disk('local')->get($entry->name);

        return response($file, 200, ['Content-Type' => 'application/octet-stream']);
    }

    public function destroy($id)
    {
        $entry = Backup::findOrFail($id);
        Storage::disk('local')->delete($entry->name);
        activity()->log("Backup <b>{$entry->name}</b> has been deleted");
        Backup::find($id)->delete();

        return redirect('admin/settings/backup')->with('info', 'Backup successfully deleted');
    }
}
