@extends('layouts.admin')

@section('content')
    @include('flash::message')

    <h1>Posts</h1>

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
                <td>{{$post->photo_id}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>{{$post->user->email}}</td>
                <td><a href="#">Edit</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>



@endsection