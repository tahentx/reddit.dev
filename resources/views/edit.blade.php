@extends('layouts.master')

<h1>Edit Input</h1>
@include('partials.posts-form')
@section('content')

<form action="{{ action('PostsController@destroy') }}" method="post">
	<input type="submit" value="Delete" class="btn btn-danger">
	{{ method_field('DELETE') }}
</form>
@stop