<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="Money, Finance, Budget">

    <title>Finance 101</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
           <strong>{{link_to_action('HomeController@showWelcome', 'Finance 101',array(),['class'=>'logo'])}}</strong>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li></li> 
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Something</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Something</div>
                                    </div>
                                </a>
                            </li>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                  
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
            		@if (Auth::check())
            		<li class="task-info">Welcome {{(Auth::user()->first_name)}}!!!!</li>
            		<li>{{link_to_action('HomeController@doLogout', 'Logout',array(),['class'=>'logout'])}}</li>
            		 
            		@else
                   <li>{{link_to_action('HomeController@showLogin', 'Login',array(),['class'=>'logout'])}}</li>
                    @endif

            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      @if (Auth::check())
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li class="mt">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-exchange"></i>
                          <span>Simulations</span>
                      </a>
                      <ul class="sub">
                          <li>{{link_to_action('SimulationsController@create', 'New Simulation')}}</li>
                          <li>{{link_to_action('SimulationsController@index', 'View All')}}</li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-exchange"></i>
                          <span>Transactions</span>
                      </a>
                      <ul class="sub">
                          <li>{{link_to_action('TransactionsController@create', 'New Transaction')}}</li>
                          <li>{{link_to_action('TransactionsController@index', 'View All')}}</li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Something</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-wrench"></i>
                          <span>Tools</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cog"></i>
                          <span>Settings</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      @endif
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	
          	<div class="row mt">
          		<div class="col-lg-12">
          		@yield('content')
          		</div>
          	</div>
			
		</section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Finance101 
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- jQuery library -->
    <script src="/assets/js/jquery.js"></script>

   <!--  jQuery library for bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!-- jQuery library for touch response on mobile devices -->
    <script src="/assets/js/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery library for side menu accordian  -->
    <script class="include" type="text/javascript" src="/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    
    <!-- jQuery library for scroller -->
    <script src="/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--jQuery library for responsive pages-->
    <script src="/assets/js/common-scripts.js"></script>

 

  </body>
</html>













    
