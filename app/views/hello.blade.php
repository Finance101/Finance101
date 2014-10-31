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

	
 
      <!-- START Top Navbar-->
         @include('navbar')
      <!-- END Top Navbar-->
	<div id="h">
		<div class="container">
			<div class="row">
			    <div class="col-md-10 col-md-offset-1 mtb2">
            <div class="row">
                    <div class="centered">
                            <h2 style="color:white">Learn to Budget</h2>
                            <p>Use our budget simulator to project your financial future.</p>
                            <p>Compare your budget lifestyles. </p>
                            <p>Free.</p>
                        <div id="main-start" class="main-start">
                                <a href="/users/create" class="btn btn-success btn-lg" id="startNowButton">Start now!</a>
                         </div>
                    </div>
                </div>
			</div>
		</div><!-- <! container --> 
	</div><!-- /h --> 
</div>
	<a name="about"></a> <!-- anchor tag for about -->
	<!-- ********** FIRST ********** -->
	<div id="w">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>About</h4>
				<p>When you're new to the REAL WORLD, like us, finances can seem very overwhelming.</p>
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
				<h4>Why?</h4>
				<p>Made By Real Bots</p>
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
				<h4 class="centered">Team</h4>
         <div class="col-md-4 col-sm-6">
          @include('teamcards')
   
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
					<p>Copyright 2014 | budgetbot.com</p>
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
