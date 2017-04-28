@extends('layouts.master')

@section('content')
	@foreach($posts as $post)

	<div class="col-md-4">
	<h3>{{!! $posts->render() !!}}</h3>
	</div>
	<p>Published at: {{ $post->created_at->setTimeZone('America/Chicago')->toDayDateTimeString }}</p>
	<p>Edited at: </p>
	@endforeach
@stop