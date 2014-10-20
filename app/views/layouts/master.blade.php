<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
	<h1>{{ Auth::id() }}</h1>

	<ul>
		@if(Auth::check())
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->first_name }} <span class="caret"></span></a>
				
				<ul class="dropdown-menu" role="menu">
					<li><a href="{{ action('TransactionsController@create') }}">New Transaction</a></li>
					<li><a href="#">View Balance History/Forcast</a></li>
					<li><a href="{{ action('HomeController@doLogout') }}">Logout</a></li>
				</ul>
			</li>

		@else
			<li><a href="{{ action('HomeController@showLogin') }}">Login</a></li>
		@endif
	</ul>
    @yield('content')
</body>
</html>