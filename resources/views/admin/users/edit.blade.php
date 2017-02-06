@extends('layouts.admin')

@section('content')

    <h2>Edit User</h2>

    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->name : 'http://placehold.it/200x200'}}" alt=""
             class="img-responsive img-rounded" style="height: 250px;">
        {{--@if(!$user->photo)--}}
        {{--<div class="container-fluid">--}}
        {{--<h3>Sin foto</h3>--}}
        {{--</div> --}}

        {{--@endif--}}
    </div>



    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

    <div class="col-sm-9">
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

            {{--<div class="form-group">--}}
            {{--{!! Form::label('password2', 'Repetir contraseña') !!}--}}
            {{--{!! Form::password('password2', ['class' => 'form-control', 'style' => 'width:40%']) !!}--}}
            {{--</div>--}}

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
            <div class="row">
                <div class="col-md-5">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

                </div>
                {!! Form::close() !!}

                <div class="col-md-7">
                    {!! Form::open(['method' => 'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>



@endsection

