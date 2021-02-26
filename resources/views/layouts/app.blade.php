<!DOCTYPE html>
<html lang="{{  app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="csrf-token" content="{{  csrf_token() }}">
	<title>@yield('title','laraBBS')-进阶</title>
	<meta name="description" content="@yield('description','laraBBS进阶')">
	<link rel="stylesheet" type="text/css" href="{{  mix('css/app.css') }}">

	@yield('styles')
</head>
<body>
	<div id="app" class="{{  route_class() }}-page">
		@include('layouts._header')
		<div class="container">
			@include('shared._messages')
			@yield('content')
		</div>

		@include('layouts._footer')
	</div>

	<script type="text/javascript" src="{{  mix('js/app.js') }}"></script>

	@if(app()->isLocal())
		@include('sudosu::user-selector')
	@endif

	@yield('scripts')
</body>
</html>
