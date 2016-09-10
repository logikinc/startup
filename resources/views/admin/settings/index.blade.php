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
                <div class="panel-heading">Settings
                    <div class="pull-right">
                         <small>
                             <code><?php echo $_SERVER['HTTP_HOST'] ?></code> 
                             <code><?php echo $_SERVER['REMOTE_ADDR'] ?></code>
                         </small>
                    </div>                  
                </div>

                <div class="panel-body">

                @include('admin.partials.settings_nav')

                </div>      
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Global <small class="pull-right">These settings are taken from <code>config\app.php</code></small></div>

                <div class="panel-body">
                    
                {!! Form::model($config, ['method' => 'put','route' => ['settings.updateSettings'], 'class' => 'form-horizontal']) !!}   

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-6">
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif  
                            </div>    
                    </div>
    
                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-sm-3 control-label">URL</label>
                            <div class="col-sm-6">
                        {!! Form::text('url', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('url'))
                                    <span class="help-block">{{ $errors->first('url') }}</span>
                                @endif  
                            </div>    
                    </div>

                    <div class="form-group{{ $errors->has('timezone') ? ' has-error' : '' }}">
                            <label for="timezone" class="col-sm-3 control-label">URL</label>
                            <div class="col-sm-6">
                        {!! Form::text('timezone', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('timezone'))
                                    <span class="help-block">{{ $errors->first('timezone') }}</span>
                                @endif  
                            </div>    
                    </div>
  
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
                            </div>
                          </div>    
                    </div>
                   
                 {!! Form::close() !!}  

            </div>
        </div>
    </div>
</div>
@endsection
