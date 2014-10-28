@extends ('layouts.master')
@section('content')

   <!-- START wrapper-->
   <div class="row row-table page-wrapper">
      <div class="col-lg-3 col-md-6 col-sm-8 col-xs-12 align-middle">
         <!-- START panel-->
         <div data-toggle="play-animation" data-play="fadeIn" data-offset="0" class="panel panel-dark panel-flat">
            <div class="panel-heading text-center mb-lg">
               <a href="#">
                  <img src="../app/img/logo.png" alt="Image" class="block-center img-rounded">
               </a>
               <p class="text-center mt-lg">
                  <strong>SIGNUP TO GET INSTANT ACCESS.</strong>
               </p>
            </div>
            <div class="panel-body">
               {{ Form::open(array('action' => 'UsersController@store', 'role'=>'form')) }}
               <div class="form-group has-feedback">
                     <label for="first_name" class="text-muted">First name</label>
                     {{ Form::text('first_name', null, array('name'=>'first_name', 'id'=>'first_name', 'class'=>'form-control', 'placeholder' => 'First Name', 'tabindex'=>'1')) }}
                  </div>
                   <div class="form-group has-feedback">
                     <label for="last_name" class="text-muted">Last name</label>
                     {{ Form::text('last_name', null, array('name'=>'last_name', 'id'=>'last_name', 'class'=>'form-control', 'placeholder' => 'Last Name', 'tabindex'=>'2')) }}
                  </div>
                  <div class="form-group has-feedback">
                     <label for="signupInputEmail1" class="text-muted">Email address</label>
                     {{ Form::email('email', null, array('name'=>'email', 'id'=>'email', 'class'=>'form-control', 'placeholder' => 'Email Address', 'tabindex'=>'3')) }}
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <label for="signupInputPassword1" class="text-muted">Password</label>
                     {{ Form::text('password', null, array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder' => 'Password', 'tabindex'=>'4')) }}
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="">
                           <span class="fa fa-check"></span>I agree with the <a href="#">terms</a>
                        </label>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-block btn-primary">Register</button>
              {{ Form::close() }}
            </div>
         </div>
     
  @stop