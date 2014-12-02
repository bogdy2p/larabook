@extends('layouts.default')


@section('content')

    <div class="row">
        <div class="col-xs-6 col-md-3">
            <h1>{{ $user->username }}</h1>
            @include ('users.partials.avatar' ,['size' => 100])
            
            @unless ($user->is($currentUser))
                 @include ('users.partials.follow-form')
            @endif
        </div>
        <div class="col-xs-12 col-md-6">
            
            @if ($user->is($currentUser))
                @include ('statuses.partials.publish-status-form')
            @endif
            
            
            @include ('statuses.partials.statuses', ['statuses' => $user->statuses])
        </div>
    </div>


@stop