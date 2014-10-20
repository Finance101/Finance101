<!DOCTYPE html>
<html lang="en">
  <head>

    <title>{{ Auth::id() }}</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

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
			<li><a href="{{ action('UsersController@create') }}">Register</a></li>
		@endif
	</ul>


    @yield('content')




<!-- js library-->
<script src="js/jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- backstretch background library -->
<script type="text/javascript" src="/js/jquery.backstretch.min.js"></script>

<!-- script to stretch background image -->


</body>
</html>












    
