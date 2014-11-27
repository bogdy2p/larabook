@extends('layouts.default')

@section('content')
<div class="row">
<div class="col-xs-12 col-md-3"></div>
<div class="col-xs-12 col-md-6">
<h1>Sign In!</h1>

{{ Form::open(['route' => 'login_path']) }}
    <!-- Email Form Input -->
    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    
    <!-- Password Form Input -->
    <div class="form-group">
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <!-- Form Submit Button -->
    <div class="form-group">
        {{ Form::submit('Sign In', ['class' => 'btn btn-primary'])}}
    </div>
{{ Form::close() }}
</div>
<div class="col-xs-12 col-md-3"></div>
</div>
@stop