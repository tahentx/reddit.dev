@extends('layouts.master')

@section('content')
    <h1>Edit your post!</h1>

    <form action="{{ action('PostsController@update', $post->id ) }}" method="post">
        @include('partials.posts-form')
        <input type="text" class="btn btn-default" value="{{ isset($post->title) ? $post->title:old('title') }}">
        <input type="text" class="btn btn-default" value="{{ isset($post->url) ? $post->url:old('url') }}">
        <input type="text" class="btn btn-default" value="{{ isset($post->content) ? $post->content:old('content') }}">
        {{ method_field('PUT') }}
    </form>

    <form action="{{ action('PostsController@destroy', $post->id) }}" method="post">
        {!! csrf_field() !!}
        <input type="submit" value="Delete" class="btn btn-danger">
        {{ method_field('DELETE'), $post->id }}
    </form>
@stop