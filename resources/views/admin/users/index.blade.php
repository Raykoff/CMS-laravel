@extends('layouts.admin')

@section('content')

    <h1>Users</h1>



    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Role</th>
            <th>Activity</th>
            <th>Creado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not active' }}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>

    @endsection