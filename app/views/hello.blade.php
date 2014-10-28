<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Finance 101</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/custom-animations.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

  </head>

  <body>

	!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="/" class="navbar-brand">
                 <img src="/app/img/logo.png">
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
           
               <!-- END User avatar toggle-->
               @if (Auth::check())
               <li class="pull-right">{{HTML::linkaction('HomeController@doLogout', 'Logout')}}</li>
               @else
               <li class="pull-right">{{HTML::linkaction('HomeController@doLogin', 'Login')}}</li>
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
			    	<h3>There are plenty of reasons learn finance..</h3>
			    	<h1 class="mb">what's yours?</h1>
			    </div>
			    <div class="col-md-12 mt hidden-xs">
			    	<img src="assets/img/graph.png" class="img-responsive aligncenter" alt="" data-effect="slide-bottom">
			    </div>
			</div>
		</div><! --/container -->
	</div><! --/h -->
	
	<! -- ********** FIRST ********** -->
	<div id="w">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>Handsome Analytics</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-info btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
			
			<div class="col-md-6 pull-right">
				<img src="assets/img/shot01.png" class="img-responsive alignright" alt="" data-effect="slide-right">
			</div>
		</div><! --/row -->
	</div><! --/container -->
	

	<! -- ********** BLUE SECTION - PICTON ********** -->
	<div id="picton">
		<div class="row nopadding">
			<div class="col-md-6 pull-left">
				<img src="assets/img/shot02.png" class="img-responsive alignleft" alt="" data-effect="slide-left">
			</div>
			<div class="col-md-5 mt">
				<h4>Multiple Templates Options</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
	
		</div><! --row -->
	</div><! --/Picton -->
	
	
	<! -- ********** BLUE SECTION - CURIOUS ********** -->
	<div id="curious">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>Important Tools Provided</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
			
			<div class="col-md-6 pull-right">
				<img src="assets/img/shot03.png" class="img-responsive alignright" alt="" data-effect="slide-right">
			</div>
		</div><! --/row -->
	</div><! --/curious -->

	<! -- ********** BLUE SECTION - MALIBU ********** -->
	<div id="malibu">
		<div class="row nopadding">
			<div class="col-md-6 pull-left">
				<img src="assets/img/shot04.png" class="img-responsive alignleft" alt="" data-effect="slide-left">
			</div>
			<div class="col-md-5 mt">
				<h4>Try Us For Free</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
	
		</div><! --row -->
	</div><! --/Malibu -->


	<! -- ********** BLUE SECTION - JELLY ********** -->
	<div id="jelly">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>Don't Wait, Try Us Now</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
			
			<div class="col-md-6 mt centered">
				<h1 data-effect="slide-bottom">24</h1>
				<h3>$ per month</h3>
			</div>
		</div><! --/row -->
	</div><! --/Jelly -->

	<! -- ********** FOOTER ********** -->
	<div id="f">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 centered">
					<h4 class="mb">Grab Our Offer Now. Try Us For 14 Days Totally Free.</h4>
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
					<p>Copyright 2014 | LandingSumo.com</p>
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
  </body>
</html>
