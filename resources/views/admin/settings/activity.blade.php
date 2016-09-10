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
                <div class="panel-heading">Activity log</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Activity</th>
                                    <th>Who</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($activitys))
                                
                                    @foreach ($activitys as $activity)
                                 <tr>
                                    <td>{{ $activity->updated_at->diffForHumans() }}</td>                
                                    <td>{!! $activity->description !!}</td> 
                                    <td>@if(is_null($activity->causer))
                                    Register form
                                     @else
                                     <a href="/admin/users/{{ $activity->causer->id }}/edit">{{ $activity->causer->name }}</a>
                                    @endif</td>
                                </tr>
                                    @endforeach
                                @else
                                You dont have any activitys yet
                                @endif
                            </tbody>
                        </table>
                        </div>
                        {{ $activitys->links() }}
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
