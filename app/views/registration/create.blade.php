@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-3"></div>
    <div class="col-xs-12 col-md-6">
        <h1> Register ! </h1>

        @include ('layouts.partials.errors')


        {{ Form::open(['route' => 'register_path']) }}

        <!-- Username Input -->
        <div class="form-group">
            {{ Form::label('username','Username:') }}
            {{ Form::text('username',null,['class'=>'form-control']) }}
        </div>

        <!-- Email Input -->
        <div class="form-group">
            {{ Form::label('email','Email:') }}
            {{ Form::text('email',null,['class'=>'form-control']) }}
        </div>

        <!-- Password Form Input -->

        <div class="form-group">
            {{ Form::label('password','Password:') }}
            {{ Form::password('password',['class'=>'form-control']) }}
        </div>

        <!-- Password Confirmation Form Input -->

        <div class="form-group">
            {{ Form::label('password_confirm','Password Confirmation:') }}
            {{ Form::password('password_confirm',['class'=>'form-control']) }}
        </div>

        <!-- Submit Form Button -->

        <div class="form-group">
            {{ Form::submit('Sign Up', ['class'=>'btn btn-primary']) }}
        </div>

        {{ Form::close()}}
    </div>
    <div class="col-xs-12 col-md-3"></div>
</div>
@stop