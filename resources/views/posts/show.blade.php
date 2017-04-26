@extends(layouts.master)

@section('content')
@foreach($posts as $post)
	<p><?php $post = \App\Models\Post::find(1);
return $post;  ?></p>
@endforeach
@stop