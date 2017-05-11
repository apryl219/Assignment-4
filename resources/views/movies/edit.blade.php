@extends('layouts.master')

@section('title')
    Edit movie
@endsection

@section('content')
    <h1>Edit a Movie</h1>
    <p>*Required Field</p>
    <form method='POST' action='/movies/edit'>
        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{$movie->id}}'>

        <label for='title'>*Title</label>
        <input type='text' name='title' id='title' value='{{ old('title', $movie->title) }}' ><br>
        <label for='cover'>Cover Image URL</label>
        <input type='text' name='cover' id='cover' value='{{ old('cover', $movie->cover) }}' ><br>
        <label for='genre'>Genre</label>
        <input type='text' name='genre' id='genre' value='{{ old('genre', $movie->genre) }}' ><br>
        <label for='description'>Description</label>
        <input type='text' name='description' id='description' value='{{ old('description', $movie->description) }}' ><br>
        <label for='purchase_link'>*Purchase Link</label>
        <input type='text' name='purchase_link' id='purchase_link' value='{{ old('purchase_link', $movie->purchase_link) }}' ><br>
        <label for='actor_id'>Actor:</label>
        <select id='actor_id' name='actor_id'>
            @foreach($actorsForDropdown as $actor_id => $actorName)
                 <option value='{{ $actor_id }}' {{ ($movie->actor_id == $actor_id) ? 'SELECTED' : '' }}>
                     {{$actorName}}
                 </option>
             @endforeach
        </select><br>
        <input type='submit' value='Save Changes'>
    </form>
	@if(count($errors) > 0)
	    <ul>
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	@endif
@endsection