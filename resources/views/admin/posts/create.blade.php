@extends('layouts.admin')



@section('content')


<h1>Create Posts</h1>

<div>
  <div class="row">
        {!! Form::open(['method'=>'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
        
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' =>'form-control', 'placeholder' => 'Enter title']) !!}
        </div>


        <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [ 1 => 'PHP', 2 => 'Javascript', 3 => 'Vue.js'], null, ['class' =>'form-control', 'placeholder' => 'Choose a category name']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('photo_id', 'Files:') !!}
                {!! Form::file('photo_id', null, ['class' =>'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('body', 'Description:') !!}
                {!! Form::textarea('body', null, ['class' =>'form-control', 'rows' => 5, 'placeholder' => 'You\'re free to add some text here :) ']) !!}
            </div>

        

        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
  </div>
</div>




    <div class="row">
            @include('includes.form_error')
    </div>



@stop
    

