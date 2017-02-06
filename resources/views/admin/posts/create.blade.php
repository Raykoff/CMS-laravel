@extends('layouts.admin')

@section('content')
    <h3><b>Crear post</b></h3>



    <div class="row">

        <div class="col-md-12">
            {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true ]) !!}

            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        {!! Form::text('title', null,['class' => 'form-control', 'placeholder' => 'Titulo...']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        {!! Form::textarea('body', null,['class' => 'form-control', 'style' => 'max-width: 619px;
            max-height: 400px;', 'placeholder' => 'Texto...']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::select('category_id',['' => 'Elige categoria'] + $categories, null,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('photo_id', 'Imagen') !!}
                        {!! Form::file('photo_id', null,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>


        </div>

    </div>

    {!! Form::close() !!}



@endsection