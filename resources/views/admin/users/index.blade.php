@extends('layouts.admin')

@section('content')

    <h1>Users</h1>


<div class="row">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Email</th>
            <th>Privilegio</th>
            <th>Actividad</th>
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
            <td><img style="height: 18%" class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->name : 'http://placehold.it/400x400'}}" alt=""></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not    active' }}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>

                {!! Form::open(['method' => 'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm'] ) !!}
                {!! Form::close() !!}

            </td>

            {{--<td><button type="button" class="btn btn-outline-primary">Primary</button></td>--}}
        </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div class="row" style="margin-left: 40%">
        {{ $users->links() }}
    </div>



    @endsection