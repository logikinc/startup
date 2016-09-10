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
                <div class="panel-heading">Permissions</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td><a href="/admin/permissions/{{ $permission->id }}/edit">{{ $permission->name }}</a></td>
                                    <td>{{ $permission->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-right">
                    {{ $permissions->links() }}
                    </div>                    
                    <!-- Create Permission modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      <i class="fa fa-plus-circle"></i> Create permission
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Permission-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create permission</h4>
      </div>
      <div class="modal-body">
          
                  {!! Form::open(array('route' => 'permissions.store','method'=>'POST', 'class' => 'form-horizontal')) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif  
                        </div>    
                </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Create permission</button>          
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Close</button>
        
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</div>
@endsection
