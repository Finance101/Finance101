<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Meta-->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <meta name="_token" content="{{ csrf_token() }}">
   <title>Budget Bot</title>
   
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
   

   <link rel="stylesheet" type="text/css" href="/vendor/jqueryui/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
   <link rel="stylesheet" type="text/css" href="/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/jqueryui/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
   @yield('top-script')
</head>

<body>

   @include('navbar')

         
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
                  <span class="user-block-role"></span>
               </div>
            </div>
            @endif
            <!-- END user info-->
            <ul class="nav">
               <!-- START Menu-->
               <li class="nav-heading">Main navigation</li>
               <li class="active">
                  <a href="{{{ action('HomeController@showGetStarted') }}}" title="Dashboard" data-toggle="" class="no-submenu">
                     <em class="fa fa-dot-circle-o"></em>
                     <span class="item-text">Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="{{{ action('SimulationsController@index') }}}" title="Elements" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-flask"></em>
                     <span class="item-text">Budget Simulator</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="{{{ action('SimulationsController@create') }}}" title="Buttons" data-toggle="" class="no-submenu">
                           <span class="item-text">New Budget</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{{ action('SimulationsController@index') }}}" title="Notifications" data-toggle="" class="no-submenu">
                           <span class="item-text">View All</span>
                        </a>
                     </li>
                     </ul>
               <!--  end submenu-->
               </li>
               <li>
                  <a href="{{{ action('TransactionsController@index') }}}" title="Transactions" data-toggle="" class="no-submenu">
                     <em class="fa fa-exchange"></em>
                     <span class="item-text">Transactions</span>
                  </a>
               </li>
               <li>
                  <a href="#" title="Forms" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-edit"></em>
                     <span class="item-text">Example</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="form-standard.html" title="Standard" data-toggle="" class="no-submenu">
                           <span class="item-text">Example</span>
                        </a>
                     </li>
                     <li>
                        <a href="form-extended.html" title="Extended" data-toggle="" class="no-submenu">
                           <span class="item-text">Example</span>
                        </a>
                     </li>
                     <li>
                        <a href="form-validation.html" title="Validation" data-toggle="" class="no-submenu">
                           <span class="item-text">Example</span>
                        </a>
                     </li>
                     <li>
                        <a href="form-wizard.html" title="Wizard" data-toggle="" class="no-submenu">
                           <span class="item-text">Example</span>
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
               <li class="nav-heading">More tools</li>
               <li>
                  <a href="#" title="Pages" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-book"></em>
                     <span class="item-text">Glossary</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="pages/login.html" title="Login" data-toggle="" class="no-submenu">
                           <span class="item-text">Example</span>
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
                  <div class="text-sm mb-sm"></div>
                  <div data-bar-color="#cfdbe2" data-height="18" data-bar-width="3" data-bar-spacing="2" class="inlinesparkline">2,3,4,7,5,7,8,9,5,7,8,4,7</div>
               </div><title>@yield('title')</title>
               <small>Hi, {{(Auth::user()->first_name)}}. Welcome!</small>
            </h3>
            @endif
            <!-- <div data-toggle="notify" data-onload data-message="&lt;b&gt;This is notify!&lt;/b&gt; Dismiss with a click or wait for it to disappear." data-options="{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div> -->
            <div class="row">
               <!-- START dashboard main content-->
               <section class="col-md-9">
                  <!-- START chart-->
                  <div class="row">
                     <div class="col-lg-12">

                       <!--  CONTENT GOES HERE -->
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
   <!-- moment -->
   <script type="text/javascript" src="/js/moment.min.js"></script>
   <!-- Plugins-->
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="/vendor/slider/js/bootstrap-slider.js"></script>
   <script src="/vendor/filestyle/bootstrap-filestyle.min.js"></script>
   <script src="/vendor/chosen/chosen.jquery.min.js"></script> 
   <script type="text/javascript" src="/vendor/jqueryui/js/jquery-ui-1.10.4.custom.min.js"></script>
   <script type="text/javascript" src="/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
   <!-- Animo-->
   <script src="/vendor/animo/animo.min.js"></script>
   <!-- Sparklines bar charts-->
   <script src="/vendor/sparklines/jquery.sparkline.min.js"></script>
   <!-- Store + JSON-->
   <script src="/vendor/store/store+json2.min.js"></script>
   <!-- ScreenFull-->
   <script src="/vendor/screenfull/screenfull.min.js"></script>
   <!--  Highcharts Charts-->
   <script src="/vendor/highcharts/highcharts.js"></script>
   <!-- App Main-->
   <script src="/app/js/app.js"></script>
   <!-- END Scripts-->
   <script type="text/javascript">
      $(function() {
         $.ajaxSetup({
              headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
              }
         });
      });
   </script>
   @yield('bottom-script')
</body>

</html>
