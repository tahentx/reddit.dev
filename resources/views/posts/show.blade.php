@extends('layouts.master')

@section('content')
<h3>{{$post->title}}</h3>
<p>{{$post->content}}</p>
<p>{{$post->url}}</p>
@stop