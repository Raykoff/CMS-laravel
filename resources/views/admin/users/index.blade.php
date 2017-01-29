@extends('layouts.admin')

@section('content')

    <h1>Users</h1>



    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Role</th>
            <th>Activity</th>
            <th>Creado</th>
            <th>Modificar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td><img height="60" src="{{$user->photo ? $user->photo->name : ''}}" alt="">{{!($user->photo) ? 'Sin foto': ''}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not active' }}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td><a href="{{route('users.edit', $user->id)}}">Editar</a></td>
        </tr>
            @endforeach
        </tbody>
    </table>

    @endsection