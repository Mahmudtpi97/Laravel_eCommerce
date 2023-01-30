<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin Dashboard by E-commerce Shop</title>
	<meta name="description" content="Admin Dashboard by E-commerce Shop<">
	<meta name="author" content="Mahmudul Hasan">
	<meta name="keyword" content="Admin Dashboard, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/assets/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backend/assets/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{asset('backend/assets/img/favicon.ico')}}">
	<!-- end: Favicon -->

		<style type="text/css">
			/* body { background: url ( {{asset('backend/assets/img/bg-login.jpg')}} ) !important; } */
		</style>
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="login-box">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <hr>
					<h2>Registeration to Admin Account</h2>
					<form class="form-horizontal" action="{{route('admin_register.confirm') }}" method="post">
                        @csrf

						<fieldset>
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" type="text" placeholder="type username"/>
							</div>
							<div class="input-prepend" title="Phone">
								<span class="add-on"><i class="halflings-icon phone"></i></span>
								<input class="input-large span10" name="phone" id="phone" type="text" placeholder="type phone"/>
							</div>
							<div class="input-prepend" title="Email">
								<span class="add-on"><i class="halflings-icon envelope"></i></span>
								<input class="input-large span10" name="email" id="email" type="text" placeholder="type email"/>
							</div>
							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
							</div>

							<div class="button-login">
								<button type="submit" class="btn btn-primary d-block">Registration</button>
							</div>
					</form>
					<hr>
					<h3>All ready create a account <a href="{{url('admin')}}"><b>Login</b></a></h3>
				</div><!--/span-->
			</div><!--/row-->


	</div><!--/.fluid-container-->

		</div><!--/fluid-row-->

	<!-- start: JavaScript-->

    {{-- <script src="{{asset('backend/assets/js/custom.js')}}"></script> --}}
	<!-- end: JavaScript-->

</body>
</html>
