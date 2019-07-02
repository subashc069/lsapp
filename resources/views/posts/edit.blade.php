@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Post</h1>
            <hr>

            {{ Form::open(['action' => ['PostsController@update',$post->id], 'method' =>'POST']) }}
                {{form::label('title','Title')}}
                {{form::text('title', $post->title, array('class'=>'form-control'))}}
                {{form::label('body','Post Body:')}}
                {{form::textarea('body', $post->body, array('class'=>'form-control') )}}
                {{-- {{form::hidden('_method,'PUT')}} --}}
                @method('PUT')
                {{form::submit('Update Post', array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:10px'))}}
            {{ Form::close() }} 


        </div>
    </div>
    
   
@endsection