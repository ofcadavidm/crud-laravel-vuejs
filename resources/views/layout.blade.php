<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>


	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />


</head>
<body>

<div class="container">

	<div class="header clearfix">
		<h3 class="text-muted text-center">CRUD with Laravel 5.3 and VueJS</h3>
	</div>


	@yield('content')


</div>


	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	
</body>
</html>