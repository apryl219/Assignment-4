@extends('layouts.master')

@section('title')
    New movie
@endsection

@section('content')
    <h1>Add a new movie</h1>
    <p class="error">*Required Field</p>
    <form method='POST' action='/movies/new'>
        {{ csrf_field() }}


        <label for='title'>*Title</label>
        <input type='text' name='title' id='title' value='{{ old('title') }}' ><br>

        <label for='title'>Cover Image URL</label>
        <input type='text' name='cover' id='cover' value='{{ old('cover') }}' ><br>

        <label for='title'>Description</label>
        <input type='text' name='description' id='description' value='{{ old('description') }}' ><br>

        <label for='title'>*Purchase Link</label>
        <input type='text' name='purchase_link' id='purchase_link' value='{{ old('purchase_link') }}' ><br>

         <label for='actor_id'>* Actor:</label>
         <select id='actor_id' name='actor_id'>
             <option value='0'>Choose</option>
             @foreach($actorsForDropdown as $actor_id => $actorName)
                 <option value='{{ $actor_id }}'>
                     {{ $actorName }}
                 </option>
             @endforeach
         </select><br><r>

         <label>Genres</label>
         <ul>
             @foreach($genresForCheckboxes as $id => $name)
                 <li id='genres'><input
                     type='checkbox'
                     value='{{ $id }}'
                     id='genre_{{ $id }}'
                     name='genres[]'
                 >
                 <label for='genre_{{ $id }}'>{{ $name }}</label></li>
             @endforeach
         </ul>

        <input type='submit' value='Add movie'>
    </form>
	@if(count($errors) > 0)
	    <ul>
	        @foreach ($errors->all() as $error)
	            <li class="error">{{ $error }}</li>
	        @endforeach
	    </ul>
	@endif
@endsection