<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Budget Bot</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <link href='app/css/rotating-card.css' rel='stylesheet' />

    <!-- Custom styles for this template -->
    <link href="assets/css/custom-animations.css" rel="stylesheet">
 
    <link rel="stylesheet" href="/app/css/animations.css">

  </head>

  <body>

    <!-- Fixed navbar -->
  @include('navbar')

  <div id="headerwrap">
    <div class="container">
      <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2">
          <h3 style="color:white">“Don't tell me what you value, show me your budget, and I'll tell you what you value.”<small>-J.Biden</small></h3>
        <h1>New to financial <b>budgeting?</b></h1>
        <h4 style="color:white">Start learning now!</h4>
         @if (!Auth::check())
        <a href="/users/create" class="btn btn-success btn-lg"id="startNowButton">Sign Up</a>
         @endif</div>
       
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- headerwrap -->


  <!-- FEATURE SECTION -->
  <div class="container dg">
    <div class="row centered">
      <br><br>
      <div class="col-lg-8 col-lg-offset-2">
        <h2><strong>Budget Bot</strong></h2>
        <p>Budget Bot represents a learning simulation environment for the person new to budgeting. <br>
          We'll walk you through the budget basics and enable a simulation where you can visualize what your financial future may look like.<br>
          <br>This is a different approach to a financial planner, in that, we focus primarily on visualizing how budget choices can effect your money overtime.
          <br>We aim to help you choose your path before executing your budget plan.</p>
      <p><br/><br/></p>
      </div>
      <div class="col-lg-2"></div>
      <div class="col-lg-10 col-lg-offset-1">
        <!-- <img class="img-responsive" src="assets/img/munter.png" alt=""> -->
      </div>
    </div><!-- row -->
  </div><!-- container -->


  <div class="container w">
    <div class="row centered">
      <br><br>
      <div class="col-lg-4">
        <i class="fa fa-table"></i>
        <h4>DESIGN</h4>
        <p>Simple and dynamic user interface with guided tutorials.</p>
      </div><!-- col-lg-4 -->

      <div class="col-lg-4">
        <i class="fa fa-book"></i>
        <h4>FINANCIAL GLOSSARY</h4>
        <p>Those pesky financial terms defined.</p>
      </div><!-- col-lg-4 -->

      <div class="col-lg-4">
        <i class="fa fa-money"></i>
        <h4>FREE</h4>
        <p>Fits into your current budget. It's free!</p>
      </div><!-- col-lg-4 -->
    </div><!-- row -->
    <br>
    <br>
  </div><!-- container -->



<!-- teamcards row -->
  <div id="lg">
    <div class="container">
   
      <h4>OUR AWESOME TEAM</h4>
      <div class="col-md-4 col-sm-6">
            @include('teamcards')
      </div>
  </div>
<!--   end teamcards -->

  
  
  <div id="blue">
    <div class="container">
      <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2">
          <h4>WE ARE GRADUATES OF CODEUP. PROGRAMMING OUR SKILL. CREATING OUR PASSION.</h4>
          <p>We believe financing can be simple.</p>
        </div>
      </div><!-- row -->
    </div><!-- container -->
  </div><! -- r wrap -->
  
  
  <!-- FOOTER -->
  <div id="f">
    <div class="container">
      <div class="row centered">
       <!-- footer for any extra info -->
    
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- Footer -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
