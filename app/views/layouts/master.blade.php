<!DOCTYPE html>

<html lang="en" class="no-ie">

<head>
   <!-- Meta-->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>Finance 101</title>
   
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="/app/css/bootstrap.css">
   <!-- Vendor CSS-->
   <link rel="stylesheet" href="/vendor/fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="/vendor/animo/animate+animo.css">
   <link rel="stylesheet" href="/vendor/csspinner/csspinner.min.css">
   <!-- custom css -->
   <link rel="stylesheet" href="/app/css/beadmin-theme-a.css">
   <!-- App CSS-->
   <link rel="stylesheet" href="/app/css/app.css">
   <!-- Modernizr JS Script-->
   <script src="/vendor/modernizr/modernizr.js" type="application/javascript"></script>
   <!-- FastClick for mobiles-->
   <script src="/vendor/fastclick/fastclick.js" type="application/javascript"></script>
</head>

<body>
   <!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="/" class="navbar-brand">
               <div class="brand-logo">
                  <img src="app/img/logo.png" alt="App Logo" class="img-responsive">
               </div>
               <div class="brand-logo-collapsed">
                  <img src="app/img/logo-single.png" alt="App Logo" class="img-responsive">
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
               <!-- START User avatar toggle-->
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-user">
                     <em class="fa fa-user"></em>
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
            
         </div>
         <!-- END Nav wrapper-->

         <!-- START Search form-->
         <form role="search" action="search.html" class="navbar-form">
            <div class="form-group has-feedback">
               <input type="text" placeholder="Type and hit Enter.." class="form-control">
               <div data-toggle="navbar-search-dismiss" class="fa fa-times form-control-feedback"></div>
            </div>
            <button type="submit" class="hidden btn btn-default">Submit</button>
         </form>
         <!-- END Search form-->
      </nav>
      <!-- END Top Navbar-->
      @if (Auth::check())
      <!-- START aside-->
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <nav class="sidebar">
            <!-- START user info-->
            <div class="item user-block">
               <!-- User picture-->
               <div class="user-block-picture">
                  <div class="user-block-status">
                     <img src="app/img/user/02.jpg" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                     <div class="circle circle-success circle-lg"></div>
                  </div>
                  <!-- Status when collapsed-->
               </div>
               <!-- Name and Role--> 
               @if (Auth::check())
               <div class="user-block-info">
                  <span class="user-block-name item-text">Welcome {{(Auth::user()->first_name)}}</span>
                  <span class="user-block-role">UX-Dev</span>
               </div>
            </div>
            @endif
            <!-- END user info-->
            <ul class="nav">
               <!-- START Menu-->
               <li class="nav-heading">Main navigation</li>
               <li class="active">
                  <a href="index.html" title="Dashboard" data-toggle="" class="no-submenu">
                     <em class="fa fa-dot-circle-o"></em>
                     
                     <span class="item-text">Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="/simulations" title="Widgets" data-toggle="" class="no-submenu">
                     <em class="fa fa-flask"></em>
                     <span class="item-text">Budget Simulator</span>
                  </a>
               </li>
               <li>
                  <a href="#" title="Elements" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-flask"></em>
                     <span class="item-text">Transactions</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="button.html" title="Buttons" data-toggle="" class="no-submenu">
                           <span class="item-text">Buttons</span>
                        </a>
                     </li>
                     <li>
                        <a href="notifications.html" title="Notifications" data-toggle="" class="no-submenu">
                           <span class="item-text">Notifications</span>
                        </a>
                     </li>
                     <li>
                        <a href="spinners.html" title="Spinners" data-toggle="" class="no-submenu">
                           <span class="item-text">Spinners</span>
                        </a>
                     </li>
                     <li>
                        <a href="animations.html" title="Animations" data-toggle="" class="no-submenu">
                           <span class="item-text">Animations</span>
                        </a>
                     </li>
                     <li>
                        <a href="dropdown-animations.html" title="Dropdown" data-toggle="" class="no-submenu">
                           <span class="item-text">Dropdown</span>
                        </a>
                     </li>
                     <li>
                        <a href="panels.html" title="Panels" data-toggle="" class="no-submenu">
                           <span class="item-text">Panels</span>
                        </a>
                     </li>
                     <li>
                        <a href="portlets.html" title="Portlets" data-toggle="" class="no-submenu">
                           <span class="item-text">Portlets</span>
                        </a>
                     </li>
                     <li>
                        <a href="maps.html" title="Maps" data-toggle="" class="no-submenu">
                           <span class="item-text">Maps</span>
                        </a>
                     </li>
                     <li>
                        <a href="grid.html" title="Grid" data-toggle="" class="no-submenu">
                           <span class="item-text">Grid</span>
                        </a>
                     </li>
                     <li>
                        <a href="grid-masonry.html" title="Grid Masonry" data-toggle="" class="no-submenu">
                           <span class="item-text">Grid Masonry</span>
                        </a>
                     </li>
                     <li>
                        <a href="typo.html" title="Typography" data-toggle="" class="no-submenu">
                           <span class="item-text">Typography</span>
                        </a>
                     </li>
                     <li>
                        <a href="icons.html" title="Icons" data-toggle="" class="no-submenu">
                           <div class="label label-primary pull-right">+400</div>
                           <span class="item-text">Icons</span>
                        </a>
                     </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li>
                  <a href="#" title="Forms" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-edit"></em>
                     <span class="item-text">Forms</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="form-standard.html" title="Standard" data-toggle="" class="no-submenu">
                           <span class="item-text">Standard</span>
                        </a>
                     </li>
                     <li>
                        <a href="form-extended.html" title="Extended" data-toggle="" class="no-submenu">
                           <span class="item-text">Extended</span>
                        </a>
                     </li>
                     <li>
                        <a href="form-validation.html" title="Validation" data-toggle="" class="no-submenu">
                           <span class="item-text">Validation</span>
                        </a>
                     </li>
                     <li>
                        <a href="form-wizard.html" title="Wizard" data-toggle="" class="no-submenu">
                           <span class="item-text">Wizard</span>
                        </a>
                     </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li>
                  <a href="#" title="Charts" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-bar-chart-o"></em>
                     <span class="item-text">Charts</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="chart-flot.html" title="Flot" data-toggle="" class="no-submenu">
                           <span class="item-text">Flot</span>
                        </a>
                     </li>
                     <li>
                        <a href="chart-radial.html" title="Radial" data-toggle="" class="no-submenu">
                           <span class="item-text">Radial</span>
                        </a>
                     </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li>
                  <a href="#" title="Tables" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-table"></em>
                     <span class="item-text">Tables</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="table-standard.html" title="Standard" data-toggle="" class="no-submenu">
                           <span class="item-text">Standard</span>
                        </a>
                     </li>
                     <li>
                        <a href="table-extended.html" title="Extended" data-toggle="" class="no-submenu">
                           <span class="item-text">Extended</span>
                        </a>
                     </li>
                     <li>
                        <a href="table-datatable.html" title="DataTables" data-toggle="" class="no-submenu">
                           <span class="item-text">DataTables</span>
                        </a>
                     </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li class="nav-heading">More elements</li>
               <li>
                  <a href="#" title="Pages" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-file-text-o"></em>
                     <span class="item-text">Pages</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="pages/login.html" title="Login" data-toggle="" class="no-submenu">
                           <span class="item-text">Login</span>
                        </a>
                     </li>
                     <li>
                        <a href="pages/signup.html" title="Sign up" data-toggle="" class="no-submenu">
                           <span class="item-text">Sign up</span>
                        </a>
                     </li>
                     <li>
                        <a href="pages/recover.html" title="Recover Password" data-toggle="" class="no-submenu">
                           <span class="item-text">Recover Password</span>
                        </a>
                     </li>
                     <li>
                        <a href="pages/lock.html" title="Lock" data-toggle="" class="no-submenu">
                           <span class="item-text">Lock</span>
                        </a>
                     </li>
                     <li>
                        <a href="template.html" title="Starter Template" data-toggle="" class="no-submenu">
                           <span class="item-text">Starter Template</span>
                        </a>
                     </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li>
                  <a href="#" title="Extras" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-plus"></em>
                     <span class="item-text"></span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="timeline.html" title="Timeline" data-toggle="" class="no-submenu">
                           <span class="item-text">Timeline</span>
                        </a>
                     </li>
                     <li>
                        <a href="calendar.html" title="Calendar" data-toggle="" class="no-submenu">
                           <span class="item-text">Calendar</span>
                        </a>
                     </li>
                     <li>
                        <a href="invoice.html" title="Invoice" data-toggle="" class="no-submenu">
                           <span class="item-text">Invoice</span>
                        </a>
                     </li>
                     <li>
                        <a href="search.html" title="Search" data-toggle="" class="no-submenu">
                           <span class="item-text">Search</span>
                        </a>
                     </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
            </ul>
         </nav>
         <!-- END Sidebar (left)-->
      </aside>
      <!-- End aside-->
      
      <!-- START Main section-->
     <section>
         <!-- START Page content-->
         <div class="content-wrapper">
             <h3>
               <div class="pull-right text-center">
                  <div class="text-sm mb-sm">500 ratings</div>
                  <div data-bar-color="#cfdbe2" data-height="18" data-bar-width="3" data-bar-spacing="2" class="inlinesparkline">2,3,4,7,5,7,8,9,5,7,8,4,7</div>
               </div>Dashboard
               <small>Hi, {{(Auth::user()->first_name)}}. Welcome back!</small>
            </h3>
            @endif
            <div data-toggle="notify" data-onload data-message="&lt;b&gt;This is notify!&lt;/b&gt; Dismiss with a click or wait for it to disappear." data-options="{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div>
            <div class="row">
               <!-- START dashboard main content-->
               <section class="col-md-9">
                  <!-- START chart-->
                  <div class="row">
                     <div class="col-lg-12">


                      @yield('content') 
                        


                     
               </section>
               
            </div>
         </div>
         <!-- END Page content-->
      </section>
      <!-- END Main section-->
   </div>
   <!-- END Main wrapper-->
   <!-- START Scripts-->
   <!-- Main vendor Scripts-->
   <script src="/vendor/jquery/jquery.min.js"></script>
   <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
   <!-- Plugins-->
   <script src="/vendor/chosen/chosen.jquery.min.js"></script>
   <script src="/vendor/slider/js/bootstrap-slider.js"></script>
   <script src="/vendor/filestyle/bootstrap-filestyle.min.js"></script>
   <!-- Animo-->
   <script src="/vendor/animo/animo.min.js"></script>
   <!-- Sparklines-->
   <script src="/vendor/sparklines/jquery.sparkline.min.js"></script>
   <!-- Slimscroll-->
   <script src="/vendor/slimscroll/jquery.slimscroll.min.js"></script>
   <!-- Store + JSON-->
   <script src="/vendor/store/store+json2.min.js"></script>
   <!-- ScreenFull-->
   <script src="/vendor/screenfull/screenfull.min.js"></script>
   <!-- START Page Custom Script-->
   <!--  Flot Charts-->
   <script src="/vendor/flot/jquery.flot.min.js"></script>
   <script src="/vendor/flot/jquery.flot.tooltip.min.js"></script>
   <script src="/vendor/flot/jquery.flot.resize.min.js"></script>
   <script src="/vendor/flot/jquery.flot.pie.min.js"></script>
   <script src="/vendor/flot/jquery.flot.time.min.js"></script>
   <script src="/vendor/flot/jquery.flot.categories.min.js"></script>
   <!--[if lt IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
   <!-- END Page Custom Script-->
   <!-- App Main-->
   <script src="/app/js/app.js"></script>
   <!-- END Scripts-->
</body>

</html>