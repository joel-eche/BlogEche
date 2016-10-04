@extends('admin.template.main')

@section('title','Lista de articulos')

@section('content')
<a href="{{route('admin.articles.create')}}" class="btn btn-info">Registrar nuevo Articulo</span></a>
<!-- BUSCADOR -->
	{!! Form::open(['route'=>'admin.articles.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
	<div class="input-group"> 
		{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Buscar articulo','aria-describedby'=>'search']) !!}
		<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	</div>

	{!! Form::close() !!}
<!-- FIN BUSCADOR -->
<hr>
<table class="table table-striped">
	<thead>
		<th>ID</th>
		<th>Titulo</th>
		<th>Categoria</th>
		<th>User</th>
		<th>Acción</th>
	</thead>
	@foreach($articles as $article)
	<tr>
		<td>{{$article->id}}</td>
		<td>{{$article->title}}</td>
		<td>{{$article->category->name}}</td>
		<td>{{$article->user->name}}</td>

		<td>
			<a href="{{route('admin.articles.edit',$article->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
			<a href="{{route('admin.articles.destroy',$article->id)}}" onclick="return confirm('Sure?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
		</td>
	</tr>
	@endforeach
</table>
{!! $articles->links() !!}
@endsection