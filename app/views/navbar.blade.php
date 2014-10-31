<!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="{{{ action('HomeController@showGetStarted') }}}" class="navbar-brand">
               <div class="brand-logo">
                  <img src="/app/img/logo.png" alt="App Logo" class="img-responsive">
               </div>
              @if (Auth::check()) <div class="brand-logo-collapsed">
                  <img src="/app/img/logo-single.png" alt="App Logo" class="img-responsive">
               </div>@endif
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
               <!-- START User avatar toggle-->
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-user">
                     <em class="fa fa-user"></em>
                  </a>
               </li>
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
