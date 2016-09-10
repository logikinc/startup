@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2">
            
                @include('layouts.partials.alerts') 
            
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in, welcome!</p>
                    
                    @hasrole('User')
                    <hr>
                    <p>
                    If you can reed this, then you have the <b>User Role</b>    
                    </p>
                    @endrole
                    
                    @hasrole('Moderator')
                    <hr>
                    <p>
                    If you can reed this, then you have the <b>Moderator Role</b>    
                    </p>
                    @endrole  
                    
                    @hasrole('Administrator')
                    <hr>
                    <p>
                    If you can reed this, then you have the <b>Administrator Role</b>   
                    </p>
                    @endrole                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
