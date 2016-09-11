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
                <div class="panel-heading">Backup
                    </div> 
                    <div class="panel-body">
                    
                    @include('admin.partials.settings_nav')            
                                
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Backupfiles
                    <div class="pull-right">
                                {!! Form::open(array('route' => 'storebackup','method'=>'POST')) !!}                         
                            <button type="submit" class="btn btn-success btn-xs">
                              <i class="fa fa-plus-circle"></i> Take backup
                            </button>
                                {!! Form::close() !!} 
                    </div>                 
                </div>
                    <div class="panel-body">
                        <p><small>All files will be stored in <code>public/backups</code> folder. This is not the most secure place to stor backups. So change this to S3 or to another location.</small></p>
                  <ul class="breadcrumb">
                    @foreach ($breadcrumbs as $path => $disp)
                      <li><a href="/admin/settings/backup?folder={{ $path }}">{{ $disp }}</a></li>
                    @endforeach
                    <li class="active">{{ $folderName }}</li>
                  </ul> 
                        <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Date</th>
                              <th>Size</th>
                              <th data-sortable="false">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($subfolders as $path => $name)
                              <tr>
                                <td>
                                  <a href="/admin/settings/backup?folder={{ $path }}">
                                    <i class="fa fa-folder fa-lg fa-fw"></i>
                                    {{ $name }}
                                  </a>
                                </td>
                                <td>Folder</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                  <button type="button" class="btn btn-xs btn-danger"
                                          onclick="delete_folder('{{ $name }}')">
                                    <i class="fa fa-times-circle"></i>
                                  </button>
                                </td>
                              </tr>
                            @endforeach                              
                            @foreach ($files as $file)
                              <tr>
                                <td>
                                  <a href="{{ $file['webPath'] }}">
                                    @if (is_image($file['mimeType']))
                                      <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                                    @else
                                      <i class="fa fa-file-o fa-lg fa-fw"></i>
                                    @endif
                                    {{ $file['name'] }}
                                  </a>
                                </td>
                                <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                                <td>{{ $file['modified']->format('d-m-Y H:i') }}</td>
                                <td>{{ human_filesize($file['size']) }}</td>
                                <td>
                                  <button type="button" class="btn btn-xs btn-danger"
                                          onclick="delete_file('{{ $file['name'] }}')">
                                    <i class="fa fa-times-circle"></i>
                                  </button>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  @include('admin.settings.modals.deletefile')
  @include('admin.settings.modals.deletefolder')

@stop

@section('scripts')

@include('admin.settings.partials.js')

@stop