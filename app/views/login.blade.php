<!DOCTYPE html>

<html lang="en" class="no-ie">


<head>
 
   <title>Login</title>
   
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="../app/css/bootstrap.css">
   <!-- Vendor CSS-->
   <link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="../vendor/animo/animate+animo.css">
   <!-- App CSS-->
   <link rel="stylesheet" href="../app/css/app.css">
   <link rel="stylesheet" href="../app/css/common.css">
   <!-- Modernizr JS Script-->
   <script src="../vendor/modernizr/modernizr.js" type="application/javascript"></script>
   <!-- FastClick for mobiles-->
   <script src="../vendor/fastclick/fastclick.js" type="application/javascript"></script>
</head>

<body>
   <!-- START wrapper-->
   <div class="row row-table page-wrapper">
      <div class="col-lg-3 col-md-6 col-sm-8 col-xs-12 align-middle">
         <!-- START panel-->
         <div data-toggle="play-animation" data-play="fadeIn" data-offset="0" class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="#">
                  <img src="../app/img/logo.png" alt="Image" class="block-center img-rounded">
               </a>
               <p class="text-center mt-lg">
                  <strong>SIGN IN TO CONTINUE.</strong>
               </p>
            </div>
            <div class="panel-body">

            {{ Form::open(array('action' => 'HomeController@doLogin', 'class'=>'mb-lg', 'role'=>'form')) }}
                   
                   <div class="text-right mb-sm">{{link_to_action('UsersController@create', 'Need to Signup?')}}
                  </div>
                  <div class="form-group has-feedback">
                     {{ Form::email('email', Input::old('email'), array('class'=>'form-control', 'placeholder' => 'Enter E-mail', 'id'=>'exampleInputEmail1')) }}
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     {{ Form::password('password', array('class'=>'form-control', 'placeholder' => 'Password', 'id'=>'exampleInputPassword1')) }}
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="">
                           <span class="fa fa-check"></span>Remember Me</label>
                     </div>
                     <div class="pull-right"><a href="#" class="text-muted">Forgot your password?</a>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-block btn-primary">Login</button>
               {{ Form::close() }}
            </div>
         </div>
         <!-- END panel-->
      </div>
   </div>
   <!-- END wrapper-->
   <!-- START Scripts-->
   <!-- Main vendor Scripts-->
   <script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
   <!-- Animo-->
   <script src="../vendor/animo/animo.min.js"></script>
   <!-- Custom script for pages-->
   <script src="../app/js/pages.js"></script>
   <!-- END Scripts-->
</body>

</html>