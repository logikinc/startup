@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.partials.alerts') 
        </div>
        
        @include('admin.partials.nav')
       
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>

                <div class="panel-body">

                @include('admin.partials.settings_nav')

                </div>      
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Backup <small class="pull-right">All database backup files will be stored in <code>storage/app</code> folder</small></div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Database</th>
                                    <th>Created</th>
                                    <th>Size</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($entries as $entry)
                            <tr>
                                <td><a href="{{route('getdbbackup', $entry->name)}}">{{ env('DB_DATABASE') }}</a></td>
                                <td>{{ $entry->created_at->format('d-m-Y H:i') }}</td>
                                <td>{{ human_filesize(Storage::size($entry->name)) }}</td>
                                <td>
                		            {!! Form::open(['method' => 'DELETE','route' => ['destroybackup', $entry->id]]) !!}
                                        <a href="#" class="btn btn-danger btn-xs" onclick="$(this).closest('form').submit()"><i class="fa fa-times-circle"></i></a>
                                    {!! Form::close() !!}                                    
                                </td>
                            </tr>    
                            @endforeach
                            </tbody>
                        </table> 
                        </div>
                            <div class="pull-right">
                            {{ $entries->links() }}
                            </div>                           
                                {!! Form::open(array('route' => 'storebackup','method'=>'POST')) !!}    
                                    <button type="submit" class="btn btn-primary">
                                       <i class="fa fa-plus-circle"></i> Create new backup
                                    </button>          
                                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
