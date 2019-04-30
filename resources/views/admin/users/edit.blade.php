@extends('layouts.admin')




@section('content')


<h1>Edit Users</h1>

{{--<form method="post" action="/posts">--}}
    <div class="row">      
    
    <div class="col-sm-3">

    

          <img src="{{$user->photo ? $user->photo->file : 'https://placehold.it/350x350'}}" alt="" class="img-responsive img-rounded">

           </div>

        <div class="col-sm-9">

    {!! Form::model($user, ['method'=>'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

   
     
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
            {!! Form::text('password', null,  ['class' =>'form-control', 'placeholder' => 'Choose a password']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class' =>'form-control']) !!}
    </div>

   
        
     <div class="form-group">
             {!! Form::label('role_id', 'Role:') !!}
             {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, ['class' =>'form-control']) !!}
            </div>
    
    <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(1 => 'Is Active', 0 => 'Not Active'), null, ['class' =>'form-control', 'placeholder' => 'Choose a status']) !!}
    </div>   

    <div class="form-group">
        {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


 </div>
</div>


<div class="row">
    @include('includes.form_error')
</div>



@stop
    




