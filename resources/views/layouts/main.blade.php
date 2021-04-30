<!DOCTYPE html>
<html>
<head>

	<title>Job Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include('../partials.header')
	@yield('include_header')
	<script defer src="{{ asset('js/app.js') }}"  ></script>

</head>
<body>
	@include('../partials.nav')

	@yield('content')
	@include('../partials.footer')


 
</body>
</html>