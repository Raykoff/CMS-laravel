@extends('layouts.admin')

@section('content')



    <h1>Users</h1>

    @include('flash::message')



    <table class="table table-bordered">
        <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Email</th>
            <th>Privilegio</th>
            <th>Actividad</th>
            <th>Nº de posts</th>
            <th>Creado
            <th>Actualizado</th>
            <th>Modificar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td><img style="height: 80px" class="img-responsive img-rounded"
                         src="{{$user->photo ? $user->photo->name : 'http://placehold.it/400x400'}}" alt=""></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Not active' }}</td>
                <td>{{$user->posts->count() > 0 ? $user->posts->count() : 'Ninguno'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Editar</a>
                </td>

                {{--<td><button type="button" class="btn btn-outline-primary">Primary</button></td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="row" style="margin-left: 40%">
        {{ $users->links() }}
    </div>




@endsection