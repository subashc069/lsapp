@extends('layouts.app')

@section('content')
<div class="container">
        <h1 class="">posts</h1>

        @if (count($posts)>0)
            @foreach ($posts as $post)
                <div class="card">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>Written on {{$post->created_at}}</small>
                </div>
            @endforeach
            {{$posts->links()}}
        @else
            <p>No posts found</p>
        @endif
</div>
    
@endsection