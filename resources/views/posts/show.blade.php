@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-default">Edit</a>
    <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Delete Post</button>
    </form>
@endsection