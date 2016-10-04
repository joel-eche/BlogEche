@extends('admin.template.main')
@section('title','Editar Usuario')
@section('content')
  {!! Form::open(['route'=>['admin.users.update',$user],'method'=>'PUT']) !!}
      <h3>Editar usuario {{$user->name}}</h3>
    <hr>
    <div class="form-group">
      {!! Form::label('name','Nombre') !!}
      {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre completo','required']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email','Correo Electrónico') !!}
      {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'example@gmail.com','required']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('type','Tipo') !!}
      {!! Form::select('type',[''=>'Selecciona un tipo...','member'=>'Miembro','admin'=>'Admin'],null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>
  {!!Form::close()!!}
@endsection
