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
			<--Add Header Image here in master.blade.php-->
		</header>
		
		<section>
			@yield('content')
		</section>

	</body>
</html>