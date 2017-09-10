<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{!! asset('assets/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
	{{-- {!! Html::style('assets/css/bootstrap.min.css') !!} --}}
</head>
<body>
	{{-- @section('sidebar')
		This is the master sidebar.
	@show --}}

	<div class="container">
		@yield('content')
	</div>
	<script type="text/javascript" src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
	{{-- {!! Html::script('assets/js/bootstrap.min.js') !!} --}}
</body>
</html>