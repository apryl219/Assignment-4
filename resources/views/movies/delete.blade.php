@extends('layouts.master')

@section('title')
	Confirm deletion: {{ $movie-> title }}
@endsection

@section('content')

	<h1>Confirm Deletion</h1>

	<form action="POST" action='/movies/delete'>
		
		{{ csrf_field() }}

		<input type="hidden" name="id" value="{{ $movie->id }}" ?>

		<h2>Are you sure you want to delete <em>{{ $movie->title }} </em>?</h2>

		<input type="submit" value='Yes, delete this movie.' class='delete'>
	</form>

@endsection