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
		<header>
			<--Add Header Image here in master.blade.php-->
		</header>
		
		<section>
			@yield('content')
		</section>

	</body>
</html>