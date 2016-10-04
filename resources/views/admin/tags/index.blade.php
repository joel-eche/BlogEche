@extends('admin.template.main')

@section('title','Lista de ususarios')

@section('content')
<a href="{{route('admin.tags.create')}}" class="btn btn-info">Registrar nuevo Tag</span></a>
<!-- BUSCADOR -->
	{!! Form::open(['route'=>'admin.tags.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
	<div class="input-group"> 
		{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar tag','aria-describedby'=>'search']) !!}
		<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	</div>

	{!! Form::close() !!}
<!-- FIN BUSCADOR -->
<hr>
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Acción</th>
  </thead>
  @foreach($tags as $tag)
  <tr>
    <td>{{$tag->id}}</td>
    <td>{{$tag->name}}</td>
    <td>
      <a href="{{route('admin.tags.edit',$tag->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
      <a href="{{route('admin.tags.destroy',$tag->id)}}" onclick="return confirm('Sure?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
    </td>
  </tr>
  @endforeach
</table>
{!! $tags->links() !!}
@endsection

<td></td>