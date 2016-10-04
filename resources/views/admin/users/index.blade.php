@extends('admin.template.main')

@section('title','Lista de usuarios')

@section('content')
<a href="{{route('admin.users.create')}}" class="btn btn-info">Registrar nuevo Usuario</span></a><br><hr>
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Tipo</th>
    <th>Acción</th>
  </thead>
  @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>
      @if($user->type=='admin')
      <span class="label label-success">{{$user->type}}</span>
      @else
      <span class="label label-info">{{$user->type}}</span>
      @endif
    </td>
    <td>
      <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
      <a href="{{route('admin.users.destroy',$user->id)}}" onclick="return confirm('Sure?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
    </td>
  </tr>
  @endforeach
</table>
{!! $users->links() !!}
@endsection

<td></td>
