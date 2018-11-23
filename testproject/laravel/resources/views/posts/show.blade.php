@extends('layouts.app')

@section('content')
<a class="btn btn default" href="/posts">Go back</a>
	<h1>{{$post->title}}</h1>
	<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
	<div>{!!$post->body!!}</div>
	<hr>
		<small>Written on {{$post->created_at}}</small>
	<hr>
	@if(!Auth::guest())
		@if(Auth::user()->id == $post->user_id)
		<a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
		{!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST'])!!}
			{{FORM::hidden('_method', 'DELETE')}}
			{{FORM::submit('Delete', ['class' => 'btn btn-danger'])}}
		{!!FORM::close()!!}
		@endif
	@endif
@endsection