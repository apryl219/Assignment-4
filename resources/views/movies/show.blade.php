@extends('layouts.master')

@section('title')
	Show  movie: {{ $title }}
@endsection

@section('content')
	<h1>You picked: {{ $title }} </h1>
@endsection