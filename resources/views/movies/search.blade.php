{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')
    <h1>Find a Movie</h1>

    <form method='GET' action='/search'>

        <label for='searchTerm'>Title</label>
        <input type='text' name='searchTerm' id='searchTerm' value='{{ $searchTerm or '' }}'>
        <br>

        <input type='checkbox' name='caseSensitive' {{ ($caseSensitive) ? 'CHECKED' : '' }} >
        <label>case sensitive</label>

        <br>
        <input type='submit' value='Search' class='searchbtn'>

    </form>

    @if($searchTerm != null)
        <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

        @if(count($searchResults) == 0)
            No matches found.
        @else
            
                @foreach($searchResults as $title => $movie)
                    <div class='movie'>
                        <h3>{{ $title }}</h3>
                        <img src='{{ $movie['cover']}}'>
                        <p>Description {{ $movie['description'] }}</p>    
                    </div>
                @endforeach
            
        @endif
    @endif
@endsection