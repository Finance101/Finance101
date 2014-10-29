<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <link href='app/css/rotating-card.css' rel='stylesheet' />

    <title>Budget Bot</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/custom-animations.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/css/animations.css">

  </head>

  <body>

	!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="/" class="navbar-brand">
               <!--   <img src="/app/img/logo.png"> -->
            </a>
         </div>
         <!-- END navbar header-->

         <!-- START Nav wrapper-->
         <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
               <li>
                  <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                  <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
               </li>
           	   <li>{{HTML::linkaction('HomeController@showWelcome','Home')}}</li>
           	   <li><a href="#about">About</a>
           	   <li><a href="#team">Team</a>
               <!-- END User avatar toggle-->
               @if (Auth::check())
               <li class="pull-right">{{HTML::linkaction('AuthController@doLogout', 'Logout')}}</li>
               @else
               <li class="pull-right">{{HTML::linkaction('AuthController@doLogin', 'Login')}}</li>
               @endif
            </ul>
             <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">
               
               <!-- Fullscreen-->
               <li>
                  <a href="#" data-toggle="fullscreen">
                     <em class="fa fa-expand"></em>
                  </a>
               </li>
            </ul>
      </nav>
      <!-- END Top Navbar-->
	<div id="h">
		<div class="container">
			<div class="row">
			    <div class="col-md-10 col-md-offset-1 mt">
			    	<image src="/app/img/logo-single.png"><h3>Budget Bot</h3>
			    	<h1 class="mb"></h1>
			    </div>
			    <div class="col-md-12 mt hidden-xs">
			    	<img src="assets/img/graph.png" class="img-responsive aligncenter" alt="" data-effect="slide-bottom">
			    </div>
			</div>
		</div><!-- <! container --> 
	</div><!-- /h --> 
	<a name="about"></a> <!-- anchor tag for about -->
	<!-- ********** FIRST ********** -->
	<div id="w">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>About</h4>
				<p>When you're new to the REAL WORLD finances can seem very overwhelming.</p>
				<p>What do you want to be when you grow up?</p>
				<p>How will you even get there?</p>
				<p>Do you know what your financial future will look like?</p>
				<p>You have rent, tuition, bills, and you want to have enough money for fun. Well, where do you start? </p>
				<p><small>warning:cheesy tagline below</small></p>
				<h3 id ="tagline" class="pulse">Have no fear, Budget Bot, is here!</h3>
			</div>
			
			<div class="col-md-6 pull-right">
				<img src="assets/img/shot01.png" class="img-responsive alignright" alt="" data-effect="slide-right">
			</div>
		</div><!-- <! /row -->
	</div><!--container --> 
	

	<!--  ********** BLUE SECTION - PICTON ********** --> 
	<div id="picton">
		<div class="row nopadding">
			<div class="col-md-6 pull-left">
				<img src="assets/img/shot01.png" class="img-responsive alignleft" alt="" data-effect="slide-left">
			</div>
			<div class="col-md-5 mt">
				<h4>Made By Real People</h4>
				<p>Simulate your financial future with our budget simulator.</p>
				<p>Learn what those crazy finance words mean and how to use them.</p>
				<p>Simple user interface with guided tutorials.</p>
				<p>Fits into your budget.</p>
				<p>It's free!!</p>
				<p class="mt"><a href="/users/create" class="btn btn-white btn-theme">Register Now!</a></p>
			</div>
	
		</div><!-- <!row --> 
	</div><!-- Picton --> 

	<a name="team"></a> <!-- team anchor tag -->
	<!-- ********** BLUE SECTION - JELLY ********** --> 
	<div id="jelly">
		<div class="row nopadding">
			<div class="col-sm-10 col-sm-offset-1">
				<h4 class="centered">The Team</h4>
         <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="app/images/rotating_card_thumb2.png"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="app/images/rotating_card_profile3.png"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Ryan Ingersoll</h3>
                                <p class="profession">Web Developer</p>
                                <h5><i class="fa fa-map-marker fa-fw text-muted"></i> San Antonio, TX</h5>
                                <h5><i class="fa fa-building-o fa-fw text-muted"></i> Codeup - Carlsbad </h5>
                                <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> email@gmail.com</h5>
                            </div>
                            <div class="footer">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div> 
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Experience</h4>
                                <p>In the project since 2011</p>
                                <h4 class="text-center">Areas of Expertise</h4>
                                <p>Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->
<!--         <div class="col-sm-1"></div> -->
        <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="/app/images/rotating_card_thumb.png"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="/app/images/rotating_card_profile2.png"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Frank Rodriguez</h3>
                                <p class="profession">Web Developer</p>
                                <h5><i class="fa fa-map-marker fa-fw text-muted"></i> San Antonio, TX</h5>
                                <h5><i class="fa fa-building-o fa-fw text-muted"></i> Codeup - Carlsbad </h5>
                                <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> email@gmail.com</h5>
                            </div>
                            <div class="footer">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div> 
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Experience</h4>
                                <p>Mike was working with our team since 2012.</p>
                                <h4 class="text-center">Areas of Expertise</h4>
                                <p>Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->
<!--         <div class="col-sm-1"></div> -->
        <div class="col-md-4 col-sm-6">
            <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="/app/images/rotating_card_thumb3.png"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="/app/images/rotating_card_profile.png"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Mary Klonek-Reyes</h3>
                                <p class="profession">Product Manager</p>
                                <h5><i class="fa fa-map-marker fa-fw text-muted"></i> San Antonio, TX</h5>
                                <h5><i class="fa fa-building-o fa-fw text-muted"></i> Codeup - Carlsbad </h5>
                                <h5><i class="fa fa-envelope-o fa-fw text-muted"></i> email@gmail.com</h5>
                            </div>
                            <div class="footer">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div> 
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Experience</h4>
                                <p>Inna was working with our team since 2012.</p>
                                <h4 class="text-center">Areas of Expertise</h4>
                                <p>Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col-sm-3 -->
        </div> <!-- end col-sm-10 --> 
    </div> <!-- end row -->
   
</div>
		</div><! --/row -->
	</div><! --/Jelly -->

	<! -- ********** FOOTER ********** -->
	<div id="f">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 centered">
					<h4 class="mb">We're still growing...Subscribe for Updates!</h4>
					<form role="form" action="register.php" method="post" enctype="plain"> 
	    				<input type="email" name="email" class="subscribe-input" placeholder="Enter your e-mail address..." required>
						<button class='btn btn-lg btn-info btn-sub subscribe-submit' type="submit">Yes, Please</button>
					</form>
				
				</div>

			</div><! --/row -->
		</div><! --/container -->
	</div><! --/F -->

	<! -- ********** CREDITS ********** -->
	<div id="c">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 centered">
					<p>Copyright 2014 | finance101.com</p>
				</div>
			</div>
		</div><! --/container -->
	</div><! --/C -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/retina-1.1.0.js"></script>
    <script src="assets/js/jquery.unveilEffects.js"></script>
    <script>
	$('#cheese').click(function() {
		$(#tagline).addClass("slideUp");
	});
</script>

  </body>
</html>
