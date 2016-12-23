<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>PiCKD Dashboard</title>

	<!-- Bootstrap core CSS -->
	<link href="/css/bootstrap.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="/css/main.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="/js/ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
</head>

  <body>
      @extends('layouts.admin.nav')
      <div class="container">
 	    <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a class="inbox-avatar" href="javascript:;">
                              <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                          </a>
                          <div class="user-name">
                              <h5><a href="#">Manish</a></h5>
                              <span><a href="#">don@pickd.com</a></span>
                          </div>
                      </div>
                      <div class="inbox-body">
                          <a href="create-new-post.html" title="Compose" class="btn btn-compose">
                              Create Post
                          </a>
                      </div>
                      <ul class="inbox-nav inbox-divider">
                          <li>
                              <a href="{{ url('/curator/allposts') }}"><i class="fa fa-file"></i> All Posts <span class="label label-danger pull-right">2</span></a>
                          </li>
                          <li>
                              <a href="{{ url('/curator/publishedposts') }}"><i class="fa fa-file-text"></i>Published Posts</a>
                          </li>
                          <li class="active">
                              <a href="{{ url('/curator/draftspost') }}"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
                          </li>
                      </ul>
                  </aside>
           @yield('content')
        </div>
      </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/search.js"></script>

</body>
</html>
