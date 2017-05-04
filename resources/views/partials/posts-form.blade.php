<div class="form-group">
	 {!! csrf_field() !!}
	<input type="text" name="title">
	@if ($errors->has('title'))
	{{ $errors->first('title')}}
	@endif
	
	<input type="text" name="content">
	@if ($errors->has('content'))
	{{ $errors->first('content')}}
	@endif
	
	<input type="text" name="url">
	@if ($errors->has('url'))
	{{ $errors->first('url')}}
	@endif

</div>