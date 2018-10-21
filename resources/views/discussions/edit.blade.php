@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Edit Discusson</h1>
    {!! Form::open(['action' => ['discussionController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
          {{Form::label('category', 'Category ')}}
          {{Form::select('category', ['sports' => 'Sports', 'technology' => 'Technology', 'education'=>'Education', 'politics'=>'Politics'], $post->category)}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->content, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
  </div>

@endsection
