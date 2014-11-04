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
   <!-- font awesome icons -->
   <link rel="stylesheet" href="/vendor/fontawesome/css/font-awesome.min.css">
   <!-- css animations css -->
   <link rel="stylesheet" href="/vendor/animo/animate+animo.css">
   <!-- animation spinners and throbbers-->
   <link rel="stylesheet" href="/vendor/csspinner/csspinner.min.css">
   <!-- custom css -->
   <link rel="stylesheet" href="/app/css/beadmin-theme-a.css">
   <!-- App CSS-->
   <link rel="stylesheet" href="/app/css/app.css">
   <!-- Modernizr JS Script-->
   <script src="/vendor/modernizr/modernizr.js" type="application/javascript"></script>
   
   <!-- Datepicker CSS -->
   <link rel="stylesheet" type="text/css" href="/vendor/jqueryui/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
   <link rel="stylesheet" type="text/css" href="/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
   <link rel="stylesheet" type="text/css" href="/vendor/jqueryui/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
   @yield('top-script')
</head>

<body>

   @include('navbar')
   
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
                   
                  </div>
                  <!-- Status when collapsed-->
               </div>
               <!-- Name and Role--> 
               @if (Auth::check())
               <div class="user-block-info">
               <small>You are logged in as {{(Auth::user()->email)}}</small>
                  <span class="user-block-role"></span>
               </div>
            </div>
            @endif
            <!-- END user info-->
            <ul class="nav">
               <!-- START Menu-->
               <li class="nav-heading">Main navigation</li>
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
                  <a href="#" title="budgetmanager" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-exchange"></em>
                     <span class="item-text">Budget Manager</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="{{{ action('SimulationsController@edit') }}}" title="Standard" data-toggle="" class="no-submenu">
                           <span class="item-text">My Budgets</span>
                        </a>
                     </li>
                  </ul>
               </li>
         
               <li class="nav-heading">More tools</li>
               <li>
                  <a href="{{{ action('GlossaryTermController@index') }}}" title="Pages" class="no-submenu">
                     <em class="fa fa-book"></em>
                     <span class="item-text">Glossary</span>
                  </a>
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
               </div>
               <title>@yield('title')</title>
               <small>Hi, {{(Auth::user()->first_name)}}. Welcome!</small>
            </h3>
            @endif
            <!-- <div data-toggle="notify" data-onload data-message="&lt;b&gt;This is notify!&lt;/b&gt; Dismiss with a click or wait for it to disappear." data-options="{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div> -->
            <div style="padding: 10px"class="row">
               <!-- START dashboard main content-->
               <section class="col-md-12">
                  <!-- START chart-->
                  <div class="row panel">
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
   <script type="text/javascript" src="/app/js/moment.min.js"></script>
   <!-- Plugins-->
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>\
   <!-- Bootstrap  -->
   <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
   <!-- Datpicker -->
   <script type="text/javascript" src="/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
   <!-- Animo-->
   <script src="/vendor/animo/animo.min.js"></script>
   <!-- Sparklines-->
   <script src="/vendor/sparklines/jquery.sparkline.min.js"></script>
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
   @yield('modals')
</body>

</html>