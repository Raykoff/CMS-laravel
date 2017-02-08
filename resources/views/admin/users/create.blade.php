@extends('layouts.admin')

@section('content')

    <h2>Create User</h2>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

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
                {!! Form::label('password', 'Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'style' => 'width:40%']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password2', 'Repetir contraseña') !!}
                {!! Form::password('password2', ['class' => 'form-control', 'style' => 'width:40%']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id',['' => 'Choose option'] + $roles, null, ['class' => 'form-control', 'style' => 'width:20%']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Estado') !!}
                {!! Form::select('is_active', array(''=> 'Choose option', 1 => 'Activo', 0 => 'No activo'), null, ['class' => 'form-control', 'style' => 'width:20%']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Foto:') !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
            </div>

            @include('includes.form_error')

            <div class="form-group">
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}


@endsection