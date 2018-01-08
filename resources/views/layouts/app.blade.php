<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Belajar Laravel 5.3 - @yield('title')</title>
	</head>
	<body>
		<ul>
			@section('sidebar')
			  <li>HTML</li>
			  <li>CSS</li>
			  <li>JS</li>
			@show
		</ul>
		<div class="container">
			@yield('content')
		</div>
	</body>
</html>