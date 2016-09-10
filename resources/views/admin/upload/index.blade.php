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
                <div class="panel-heading">Uploads
                    <div class="pull-right">
                        
                            <button type="button" class="btn btn-success btn-xs"
                                    data-toggle="modal" data-target="#modal-folder-create">
                              <i class="fa fa-plus-circle"></i> New Folder
                            </button>
                            <button type="button" class="btn btn-primary btn-xs"
                                    data-toggle="modal" data-target="#modal-file-upload">
                              <i class="fa fa-upload"></i> Upload
                            </button>    
                        
                    </div>                
                </div>

                <div class="panel-body">
                  <ul class="breadcrumb">
                    @foreach ($breadcrumbs as $path => $disp)
                      <li><a href="/admin/upload?folder={{ $path }}">{{ $disp }}</a></li>
                    @endforeach
                    <li class="active">{{ $folderName }}</li>
                  </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Files <small class="pull-right">All files will be stored in <code>public/uploads</code> folder</small></div>
                    <div class="panel-body">
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
                                  <a href="/admin/upload?folder={{ $path }}">
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
                                  @if (is_image($file['mimeType']))
                                    <button type="button" class="btn btn-xs btn-success"
                                            onclick="preview_image('{{ $file['webPath'] }}')">
                                      <i class="fa fa-eye"></i>
                                    </button>
                                  @endif
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
          
  @include('admin.upload.modals.createfile')
  @include('admin.upload.modals.createfolder')
  @include('admin.upload.modals.deletefile')
  @include('admin.upload.modals.deletefolder')
  @include('admin.upload.modals.viewimage')

@stop

@section('scripts')

@include('admin.upload.partials.js')

@stop