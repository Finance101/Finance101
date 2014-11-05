<!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="{{{ action('HomeController@showGetStarted') }}}" class="navbar-brand">
               <div class="brand-logo">
                  <img src="/app/images/logo.png" alt="App Logo" class="img-responsive">
               </div>
            
            </a>
         </div>
         <!-- END navbar header-->
         <!-- START Nav wrapper-->
         <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
                  <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                  <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
               </li>
                  <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                  <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
               </li>
           	   <li>{{HTML::linkaction('HomeController@showWelcome','Home')}}</li>
           	   <li><a href="http://budgetbot.info/#about">About</a></li>
           	   <li><a href="http://budgetbot.info/#team">Team</a></li>
            </ul>
             <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">
               <!-- END User avatar toggle-->
               @if (Auth::check())
               <li class="pulse"><a href="http://finance101.dev/simulations">You are logged in! BACK TO BUDGET BOT!!</a></li>
               <li >{{HTML::linkaction('AuthController@doLogout', 'Logout')}}</li>
               @else
               <li class="pulse">{{HTML::linkaction('UsersController@create', 'Sign Up')}}<li>
               <li >{{HTML::linkaction('AuthController@doLogin', 'Login')}}</li>
               @endif
               <!-- Fullscreen-->
               <li>
                  <a href="#" data-toggle="fullscreen">
                     <em class="fa fa-expand"></em>
                  </a>
               </li>
            </ul>
      </nav>
