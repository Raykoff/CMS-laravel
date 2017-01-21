@extends('layouts.admin')

@section('content')

    <h2>Create User</h2>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store']) !!}

    <div class="container-fluid">
        <div class="row">
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name',null, ['class' => 'form-control', 'style' => 'width:40%']) !!}

            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email',null, ['class' => 'form-control', 'style' => 'width:40%']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::text('role_id',null, ['class' => 'form-control', 'style' => 'width:40%']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Estado') !!}
                {!! Form::text('status',null, ['class' => 'form-control', 'style' => 'width:40%']) !!}
            </div>

    <div class="form-group">
        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
    </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection