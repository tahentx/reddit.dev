@extends('layouts.master')

@section('content')
@foreach($posts as $post)
	<p><?php echo $post; ?></p>
@endforeach
@stop