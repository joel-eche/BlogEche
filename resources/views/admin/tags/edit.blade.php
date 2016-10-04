@extends('admin.template.main')
@section('title','Editar Tag')
@section('content')
  {!! Form::open(['route'=>['admin.tags.update',$tag],'method'=>'PUT']) !!}
      <h3>Editar usuario {{$tag->name}}</h3>
    <hr>
    <div class="form-group">
      {!! Form::label('name','Nombre') !!}
      {!! Form::text('name',$tag->name,['class'=>'form-control','placeholder'=>'Nombre completo','required']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>
  {!!Form::close()!!}
@endsection
