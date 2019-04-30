@extends('layouts.admin')



@section('content')

{{ csrf_token() }}
<h1>Create Users</h1>

{{--<form method="post" action="/posts">--}}

    {!! Form::open(['method'=>'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}
     
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' =>'form-control', 'placeholder' => 'Your Name']) !!}
    </div>


    <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' =>'form-control', 'placeholder' => 'You\'re email']) !!}
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
             {!! Form::label('role_id', 'Role:') !!}
             {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, ['class' =>'form-control']) !!}
            </div>
    
    <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(1 => 'Is Active', 0 => 'Not Active'), 0, ['class' =>'form-control', 'placeholder' => 'Choose a status']) !!}
    </div>

  
    

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


</div>

<div class="row">
        @include('includes.form_error')
</div>



@stop
    

