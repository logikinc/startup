@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            @include('layouts.partials.alerts') 
	
        </div>
        
        @include('layouts.partials.nav')
        
        <div class="col-md-9">
            
            <div class="panel panel-default">
                <div class="panel-heading">Password</div>

                <div class="panel-body">
                    
                {!! Form::open(['url' => 'profile/updatepassword', 'method' => 'post', 'class' => 'form-horizontal'], Auth::user()->id) !!}
                
                {!! csrf_field() !!}
                
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-sm-3 control-label">Current password</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" id="password" name="password" placeholder="********">
                             @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                      </div>

					   <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                        <label for="new_password" class="col-sm-3 control-label">New password</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" id="new_password" name="new_password" placeholder="********">
                             @if ($errors->has('new_password'))
                                <span class="help-block">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                      </div>
					  
                      <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                        <label for="new_password" class="col-sm-3 control-label">Confirm New Password</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="********">
                             @if ($errors->has('new_password_confirmation'))
                                <span class="help-block">{{ $errors->first('new_password_confirmation') }}</span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
                        </div>
                      </div>                      
                    {!! Form::close() !!}
                    
                </div>
            </div>            
            
        </div>
        
    </div>
</div>
@endsection
