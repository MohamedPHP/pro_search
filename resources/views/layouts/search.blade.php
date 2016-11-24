<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>@yield('title', 'ProfSearch')</title>
	<!-- Fonts -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

     <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('src/css/coming-sssoon.css') }}" media="screen" title="no title">
	<link rel="stylesheet" href="{{ asset('src/css/login-register.css') }}" media="screen" title="no title">
	<link rel="stylesheet" href="{{ asset('src/css/style.css') }}" media="screen" title="no title">
</head>

<body>
	<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="{{ url('/') }}">
							<img src="{{ asset('src/images/logo.png') }}" class="logoPng" alt="logo image">
						</a>
					</li>
					@if (Auth::check())
						<li>
							<a href="#">
								<i class="fa fa-user" aria-hidden="true"></i>
								{{ Auth::user()->username }}
							</a>
						</li>
						@if (Auth::user()->isadmin == 1)
							<li>
								<a href="{{ url('/admin/dashboard') }}">
									<i class="fa fa-user" aria-hidden="true"></i>
									Dashboard
								</a>
							</li>
						@endif
					@endif
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::check())
						<li>
							<a href="{{ url('users/profile') }}">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
								profile
							</a>
						</li>
						<li>
							<a href="{{ url('/logout') }}">
								<i class="fa fa-sign-out" aria-hidden="true"></i>
								Logout
							</a>
						</li>
					@elseif (Auth::guard('Company')->check())
                        <li>
							<a href="{{ url('company/profile') }}">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
								Company profile
							</a>
						</li>
						<li>
							<a href="{{ url('company/logout') }}">
								<i class="fa fa-sign-out" aria-hidden="true"></i>
								Logout
							</a>
						</li>
					@else
						<li>
							<a href="{{ url('/login') }}">
								<i class="fa fa-sign-in" aria-hidden="true"></i>
								logIn
							</a>
						</li>
						<li>
							<a href="{{ url('/register') }}">
								<i class="fa fa-user-plus" aria-hidden="true"></i>
								register
							</a>
						</li>
					@endif

				</ul>

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>
	<div class="main" style="background-image: url({{asset('src/images/default.jpg')}}); background-size: cover;">

		<!--    Change the image source '/images/default.jpg' with your favourite image.     -->

		<div class="cover black" data-color="black"></div>

		<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->
		<div class="container">
			@yield('content')
		</div>
	</div>
</body>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
{{-- <script type="text/javascript">
    var data = [{ id: "", text: 'Select a jop Title' },{ id: 1, text: 'enhancement' }, { id: 2, text: 'bug' },];
    $(".js-example-data-array").select2({
	  data: data,
	  placeholder: "Select a Jop Title",
    });
</script> --}}
<script src="{{ asset('src/js/login-register.js') }}"></script>
<script src="{{ asset('src/js/main.js') }}"></script>


</html>
