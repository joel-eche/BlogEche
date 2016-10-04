@extends('admin.template.main')
@section('title','Listado de categorias')
@section('content')
<a href="{{route('admin.categories.create')}}" class="btn btn-info">Registrar nueva Categoria</span></a><br><hr>
<table class="table table-striped">
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Acción</th>
	</thead>
	@foreach($categories as $category)
	<tr>
		<td>{{$category->id}}</td>
		<td>{{$category->name}}</td>
		<td>
			<a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
			<a href="{{route('admin.categories.destroy',$category->id)}}" onclick="return confirm('Sure?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
		</td>
	</tr>
	@endforeach
</table>
{!! $categories->links() !!}
@endsection