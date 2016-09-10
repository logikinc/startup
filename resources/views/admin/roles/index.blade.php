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
                <div class="panel-heading">Roles</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td><a href="/admin/roles/{{ $role->id }}/edit">{{ $role->name }}</a></td>
                                    <td>
                                    @foreach ($role->permissions as $lol)    
                                  <label class="label label-primary">{{ $lol->name }}</label>
                                    @endforeach    
                                    </td>
                                    <td>{{ $role->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <div class="pull-right">
                    {{ $roles->links() }}
                    </div>
                    <!-- Create Role modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      <i class="fa fa-plus-circle"></i> Create Role
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Role-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create role</h4>
      </div>
      <div class="modal-body">
                  {!! Form::open(array('route' => 'roles.store','method'=>'POST', 'class' => 'form-horizontal')) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif  
                        </div>    
                </div>

                <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                        <label for="permission" class="col-sm-3 control-label">Permission</label>
                        <div class="col-sm-6">
                @foreach($permission as $value)
                	<label>{{ Form::checkbox('permission[]', $value->name, false, array('class' => 'name')) }}
                	{{ $value->name }}</label>
                	<br/>
                @endforeach
                            @if ($errors->has('permission'))
                                <span class="help-block">{{ $errors->first('permission') }}</span>
                            @endif  
                        </div>    
                </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Create role</button>          
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Close</button>
        
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</div>

@endsection
