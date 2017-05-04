@extends('layouts.master')

@section('content')
<div>
	@if(isset($details))
		<p> The search results for your query <b> {{ $query }} </b> are :</p>
	<h2>Posts:</h2>
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>{{}}</th>
			<th>{{}}</th>
		</tr>
	</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{{$posts->title}}</td>
				<td>{{$posts->content}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop