<!DOCTYPE html>
<html>
<head>
	<title>Job Bank</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include('admin.header')
	@yield('include_header')
</head>
<body id="page-top">
	@yield('content')
	@yield('content_resource')
	@include('admin.footer')
</body>
</html>