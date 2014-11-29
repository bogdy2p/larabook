@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <h1>Post a status</h1>
        @include ('layouts.partials.errors')


        <div class="status-post">
            {{ Form::open() }} 
            <!-- Status Form Input -->
            <div class="form-group">

                {{ Form::textarea('body',null,['class'=>'form-control', 'rows'=> 3, 'placeholder' => "What's on your mind? Is it a jackhammer ?"])}}
            </div>

            <div class="form-group status-post-submit">
                {{ Form::submit('Post Status',['class'=>'btn btn-default btn-xs'])}}
            </div>

            {{ Form::close() }}
        </div>


        @foreach($statuses as $status)
            @include('statuses.partials.status')
        @endforeach
    </div>
</div>
@stop