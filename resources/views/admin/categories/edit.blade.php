@extends('admin.template.main')
@section('title','Editar Ccategoria')
@section('content')
  {!! Form::open(['route'=>['admin.categories.update',$category],'method'=>'PUT']) !!}
      <h3>Editar usuario {{$category->name}}</h3>
    <hr>
    <div class="form-group">
      {!! Form::label('name','Nombre') !!}
      {!! Form::text('name',$category->name,['class'=>'form-control','placeholder'=>'Nombre de categoria','required']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>
  {!!Form::close()!!}
@endsection
