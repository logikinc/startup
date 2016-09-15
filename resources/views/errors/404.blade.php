@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                   <p>Error 404: The page you are looking for could not be found. </p>
                   <a href="{{ url('/') }}">Return home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection