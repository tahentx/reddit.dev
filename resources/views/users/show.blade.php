@extends('layouts.master')

@section('content')
<h3>{{$users->name}}</h3>
<p>{{$users->email}}</p>
<p>Profile last updated at:{{ $users->updated_at}}</p>
    @foreach($users->$posts as $post)
        <p>{{ $post }}</p>
    @endforeach
@stop