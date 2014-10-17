<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>@yield('finance 101')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="/blog-post/css/blog-post.css" rel="stylesheet">

</head>

<body> 

<!--  -->
    @yield('content')


               
        </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-xs-6 col-md-4">
            {{ Form::open(array('action' => 'PostsController@index', 'class' => 'form-horizontal', 'method'=> 'GET')) }}
<!-- {{$errors->has('title') ? 'has-error' : '' }} ternary-->
               <label for="search">search: </label>
               <input type="text" name="search" id="search"placeholder="search" value="{{{ Input::old('search') }}}" class= "form-control"> 
               
                <h2><input type="submit" value="search"></h2>
                <!-- <textarea rows="3"></textarea> -->
            {{ Form::close() }} 
        </div>

              
                <div class="well">
                    <h4>Finance 101 Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">transactions</a>
                                </li>
                                <li><a href="#">projections</a>
                                </li>
                                <li><a href="#">portfolios</a>
                                </li>
                            
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Finance 101 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    @yield('bottom-script')

</body>

</html>