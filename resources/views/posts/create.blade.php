@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>

            {{ Form::open(['action' => 'PostsController@store', 'method' =>'POST']) }}
                {{form::label('title','Title')}}
                {{form::text('title', '', array('class'=>'form-control'))}}
                {{form::label('body','Post Body:')}}
                {{form::textarea('body', '', array('class'=>'form-control') )}}
                {{form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:10px'))}}
            {{ Form::close() }} 


        </div>
    </div>
    
   
@endsection