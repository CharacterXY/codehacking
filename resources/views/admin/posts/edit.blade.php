@extends('layouts.admin')



@section('content')


<h1>Edit Post</h1>

  <div class="row">
      <div class="col-sm-3">

        <img src="{{$post->photo ? $post->photo->file : 'https://placehold.it/350x350'}}" alt="" class="img-responsive img-rounded">


        {!! Form::model($post, ['method'=>'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
        
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' =>'form-control', 'placeholder' => 'Enter title']) !!}
        </div>


        <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', ['' => 'Choose Categories'] + $categories, null, ['class' => 'form-control']) !!}
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
            {!! Form::submit('Edit Post', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
    </div>
  </div>
</div>




    <div class="row">
            @include('includes.form_error')
    </div>



@stop
    