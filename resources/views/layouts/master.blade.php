<!DOCTYPE html>
<html>
	<head>
		<title>
			@yield('title', 'Assignment 4')
		</title>
		<meta charset="utf-8">
		<link href="/css/styles.css" type='text/css' rel='stylesheet'>

		@stack('head')
	</head>
	<body>
		@if(Session::get('message') !=null)
			<div class="message">{{ Session::get('message') }}</div>
		@endif
		<header>
			<h1>Your Movie Watch List</h1>
			<nav>
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="/search">Search</a></li>
					<li><a href="/movies/new">Add New Movie</a></li>
				</ul>
			</nav>
		</header>
		
		<section>
			@yield('content')
		</section>

	</body>
</html>