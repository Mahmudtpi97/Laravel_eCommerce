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




</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Metro</span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white warning-sign"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 11 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">1 min</span>
                                    </a>
                                </li>


                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white tasks"></i>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">iOS Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div>
                                    </a>
                                </li>

								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white envelope"></i>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>

								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>
							</ul>
						</li>
						<!-- end: Message Dropdown -->
						<li>
							<a class="btn" href="#">
								<i class="halflings-icon white wrench"></i>
							</a>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i>
                                @if (Auth::user())
                                    {{Auth::user()->username}}
                                @else  {{'Admin'}}
                                @endif
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="{{route('logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

	<div class="container-fluid-full">
		<div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="{{route('dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                            <li>
                                <a class="dropmenu" href="{{url('admin/categories')}}"><i class="icon-list"></i><span class="hidden-tablet"> Categories</span><span class="label label-important ml-2"> Cat </span></a>
                                <ul>
                                    <li><a class="submenu" href="{{url('admin/categories')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Categories</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/add_categories')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Category</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="{{url('admin/sub_categories')}}"><i class="icon-list"></i><span class="hidden-tablet"> Sub Categories</span></a>
                                <ul>
                                    <li><a class="submenu" href="{{url('admin/sub_categories')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Categories</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/add_sub_categories')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Category</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="{{url('admin/products')}}"><i class="icon-list"></i><span class="hidden-tablet"> Products</span><span class="label label-important ml-2"> New </span></a>
                                <ul>
                                    <li><a class="submenu" href="{{url('admin/products')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Products</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/products/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Products</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="{{url('admin/products')}}"><i class="icon-list"></i><span class="hidden-tablet"> Orders</span><span class="label label-important ml-2"> New </span></a>
                                <ul>
                                    <li><a class="submenu" href="{{url('admin/orders')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Orders</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/orders/pending')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">New Orders</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/orders/complete')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Complete Orders</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="{{url('admin/sliders')}}"><i class="icon-list"></i><span class="hidden-tablet"> Sliders</span></a>
                                <ul>
                                    <li><a class="submenu" href="{{url('admin/sliders')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Sliders</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/sliders/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Sliders</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="{{url('admin/clients')}}"><i class="icon-list"></i><span class="hidden-tablet"> Clients</span></a>
                                <ul>
                                    <li><a class="submenu" href="{{url('admin/clients')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Clients</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/clients/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Clients</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="{{url('admin/social_link')}}"><i class="icon-list"></i><span class="hidden-tablet"> Social Link</span></a>
                                <ul>
                                    <li><a class="submenu" href="{{url('admin/social_link')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Link</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/create_social_link')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Link</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="{{url('admin/footer')}}"><i class="icon-list"></i><span class="hidden-tablet"> Footer</span></a>
                                <ul>
                                    <li><a class="submenu" href="{{url('admin/social_link')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Footer Items</span></a></li>
                                    <li><a class="submenu" href="{{url('admin/create_footer')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Create Item</span></a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <noscript>
                    <div class="alert alert-block span10">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                    </div>
                </noscript>

                <!-- start: Content -->
                <div id="content" class="span10">
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{url('/dashboard')}}">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="@yield('page_hero')">@yield('page_hero_title')</a></li>
                    </ul>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session('message'))
                        <div class="alert alert-info">{{ Session('message') }}</div>
                    @endif

                    @yield('admin_content')


                </div>
			<!-- end: Content -->

        </div> <!--/row-fluid-->
    </div><!--/container-fluid-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="clearfix"></div>

	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://mahmudtpi97.github.io/Portfolio/" target="_blank" alt="Admin_Dashboard">Admin Dashboard</a></span>

		</p>

	</footer>

	<!-- start: JavaScript-->

		<script src="{{asset('backend/assets/js/jquery-1.9.1.min.js')}}"></script>
	    <script src="{{asset('backend/assets/js/jquery-migrate-1.0.0.min.js')}}"></script>
		<script src="{{asset('backend/assets/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.ui.touch-punch.js')}}"></script>

		<script src="{{asset('backend/assets/js/modernizr.js')}}"></script>

		<script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.cookie.js')}}"></script>

		<script src="{{asset('backend/assets/js/fullcalendar.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.dataTables.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/excanvas.js')}}"></script>
	    <script src="{{asset('backend/assets/js/jquery.flot.js')}}"></script>
	    <script src="{{asset('backend/assets/js/jquery.flot.pie.js')}}"></script>
	    <script src="{{asset('backend/assets/js/jquery.flot.stack.js')}}"></script>
	    <script src="{{asset('backend/assets/js/jquery.flot.resize.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.chosen.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.uniform.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.cleditor.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.noty.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.elfinder.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.raty.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.iphone.toggle.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.uploadify-3.1.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.gritter.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.imagesloaded.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.masonry.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.knob.modified.js')}}"></script>

		<script src="{{asset('backend/assets/js/jquery.sparkline.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/counter.js')}}"></script>

		<script src="{{asset('backend/assets/js/retina.js')}}"></script>

        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

		<script src="{{asset('backend/assets/js/custom.js')}}"></script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>



    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        </script>
      @yield('js')
	<!-- end: JavaScript-->

</body>
</html>
