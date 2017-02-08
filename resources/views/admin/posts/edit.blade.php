@extends('layouts.admin')

@section('content')
    <h2>Edit Post</h2>

    <div class="row">

        <div class="col-md-12">
            {!! Form::model($post,['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id ], 'files' => true ]) !!}

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
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>




@endsection