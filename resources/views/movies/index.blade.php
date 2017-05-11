@extends('layouts.master')

@section('title')
	Movie Library
@endsection

@section('content')
	<h1>Your Video Library</h1>
	<div>
		<h3>New Movies Added to Your Watch List</h3>
		@foreach($newMovies as $movie)
			<div class='newmovie'>
				<h2>{{ $movie['title'] }}</h2>
			</div>
		@endforeach
	</div>
	<div>
		@foreach($movies as $movie)
			<div class='movie'>
				<h2>{{ $movie['title'] }}</h2>
				<img src="{{ $movie['cover'] }}" alt="Movie Cover">
				<p>{{ $movie['description'] }}</p>
			</div>
		@endforeach
	</div>
@endsection