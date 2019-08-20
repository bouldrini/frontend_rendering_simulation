<!doctype html>

<html>
	<head>
		@include('layout.partials.head.frontend_head', [])
	</head>

	<body>
		<div class='content'>
		    <div id="main" class="container-fix">
		        @yield('content')
		    </div>
		</div>
	</body>
</html>
