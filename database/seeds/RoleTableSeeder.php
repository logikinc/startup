<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = 'Administrator';
        $adminRole->save();

        $moderatorRole = new Role();
        $moderatorRole->name = 'Moderator';
        $moderatorRole->save();

        $userRole = new Role();
        $userRole->name = 'User';
        $userRole->save();
    }
}
