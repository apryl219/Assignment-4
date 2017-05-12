@extends('layouts.master')

@section('title')
	Movie Library
@endsection

@section('content')
	<h1>Your Video Library</h1>
	
	<div>
		@foreach($movies as $movie)
			<div class='movie'>
				<h2>{{ $movie['title'] }}</h2>
				<img src="{{ $movie['cover'] }}" alt="Movie Cover">
				<p>{{ $movie['description'] }}</p>
				<button><a href="{{ $movie['purchase_link'] }}">Rent Movie</a></button>
				<button><a href="/movies/edit/{{ $movie->id }}">Edit Movie</a></button>
				<button><a href="/movies/delete/{{ $movie->id}}">Delete Movie</a></button>
			</div>
		@endforeach
	</div>
@endsection