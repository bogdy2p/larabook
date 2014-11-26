@extends('layouts.default')

@section('content')
<div class="jumbotron">
  <h1>Welcome to larabooooook! :D</h1>
  <p>Welcome to the premier place to talk about what you want with othere. You can talk about anything here ! :)</p>
  
  <p>
      
      {{ link_to_route('register_path', 'Sign Up!', null , ['class' => 'btn btn-lg btn-primary'])}}
      
  </p>
  
  
  
</div>
@stop