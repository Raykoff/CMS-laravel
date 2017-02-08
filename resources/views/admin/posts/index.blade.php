@extends('layouts.admin')

@section('content')
    @include('flash::message')

    <h1>Posts</h1>

    @if($posts->total() > 0)

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Foro</th>
                <th>Categoría</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Email del autor</th>
                <th>Modify</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td><img style="height: 80px"
                             src="{{$post->photo ? $post->photo->name : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>{{$post->user->email}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Editar</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>


    @else
        <h4><b>No existen posts</b></h4>
    @endif



@endsection