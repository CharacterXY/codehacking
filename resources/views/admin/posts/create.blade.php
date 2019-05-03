@extends('layouts.admin')



@section('content')


<h1>Create Posts</h1>

{{--<form method="post" action="/posts">--}}

    {!! Form::open(['method'=>'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
     
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' =>'form-control', 'placeholder' => 'Enter title']) !!}
    </div>


    <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::text('content', null, ['class' =>'form-control', 'placeholder' => 'You\'re email']) !!}
        </div>

    <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', null, ['class' =>'form-control', 'placeholder' => 'Choose a password']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('photo_id', 'Files:') !!}
            {!! Form::file('photo_id', null, ['class' =>'form-control']) !!}
    </div>

    

    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


</div>

<div class="row">
        @include('includes.form_error')
</div>



@stop
    

