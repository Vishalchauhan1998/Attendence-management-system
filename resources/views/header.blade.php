<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>Admin|SCET </title>
		<meta name="description" content="WrapTheme, University Admin">
		<meta name="keywords" content="adminX, adminX Admin, University, Material Design">
		<!-- Bootstrap Material Datetime Picker Css -->
		<link  rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"/>
		<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
		<!-- Favicon-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
		<link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet" />
		<!-- Dropzone Css -->
		<link href="{{asset('assets/plugins/dropzone/dropzone.css')}}" rel="stylesheet">
        <script src="{{URL::to('assets/datatables/jquery.dataTables.min.js')}}"></script>
        <link rel="stylesheet" href="{{URL::to('assets/datatables/jquery.dataTables.min.css')}}">
		<!-- Custom Css -->
		<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
		<link href="{{asset('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
		<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script> Sparkline Plugin Js
		<script src="{{asset('assets/bundles/flotscripts.bundle.js')}}"></script><!-- Flot Charts Plugin Js -->
		<script src="{{asset('assets/bundles/morrisscripts.bundle.js')}}"></script> <!-- Morris Plugin Js -->
		<script src="{{asset('assets/bundles/countto.bundle.js')}}"></script> <!-- Jquery CountTo Plugin Js -->
		<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script><!-- Jquery Knob Plugin Js -->
		<script src="{{asset('assets/js/pages/widgets/infobox/infobox-1.js')}}"></script>
		<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script> <!-- JVectorMap Plugin Js -->
		<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script> <!-- JVectorMap Plugin Js -->

		<script src="{{asset('assets/js/pages/index.js')}}"></script>
		<script src="{{asset('assets/js/pages/charts/sparkline.js')}}"></script>
		<script src="{{asset('assets/js/pages/maps/jvectormap.js')}}"></script>
		<script src="{{asset('assets/js/pages/charts/jquery-knob.js')}}"></script>
		<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		 <!-- Lib Scripts Plugin Js ( jquery.v2.1.4.js ) -->
		<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->
		<script src="{{asset('assets/plugins/autosize/autosize.js')}}"></script> <!-- Autosize Plugin Js -->
		<script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script> <!-- Moment Plugin Js -->
		<script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script> <!-- Dropzone Plugin Js -->
		<!-- Bootstrap Material Datetime Picker Plugin Js -->
		<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
		<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
		<script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>

        Custom Js
        <script src="{{URL::to('assets/js/pages/tables/jquery-datatable.js')}}"></script>
        <script src="{{URL::to('assets/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
        <script src="{{URL::to('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.html')}}"></script>
        <script src="{{URL::to('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
        <script src="{{URL::to('assets/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
        <script src="{{URL::to('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
        <script src="{{URL::to('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
        <script src="{{URL::to('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

		<style>
            .aa
            {
                padding: 8px;
                line-height: 1.428571429;

                border-top: 1px solid #ddd;
            }
            .form1
            {
                background: #000000;
            }
		</style>
	</head>

	<body class="theme-blush"><!-- Page Loader -->
			<div class="page-loader-wrapper"></div><!-- Overlay For Sidebars -->
			<div class="overlay"></div>
			<div class="search-bar"><!-- Search  -->
				<div class="search-icon"> <i class="material-icons">search</i> </div>
				<input type="text" placeholder="Explore adminX...">
				<div class="close-search"> <i class="material-icons">close</i> </div>
			</div><!-- Top Bar -->
			<nav class="navbar clearHeader">
				<div class="container-fluid">
					<div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="{{url('dashboard')}}"><img class="logo" src="{{asset('assets/images/scet.jpg')}}" alt="profile img">SCET</a> </div>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="javascript:void(0);" class="js-search" data-close="true"><i class="zmdi zmdi-search"></i></a>
							</li>
							<li class="dropdown menu-app">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i> </a>
								<ul class="dropdown-menu">
									<li class="body">
										<ul class="menu">
											<li>
												<ul>
													<li><a href="javascript:void(0)"><i class="zmdi zmdi-email"></i><span>Mail</span></a></li>
													<li><a href="javascript:void(0)"><i class="zmdi zmdi-accounts-list"></i><span>Contacts</span></a></li>
													<li><a href="javascript:void(0)"><i class="zmdi zmdi-comment-text"></i><span>Chat</span></a></li>
													<li><a href="javascript:void(0)"><i class="zmdi zmdi-arrows"></i><span>Notes</span></a></li>
													<li><a href="javascript:void(0)"><i class="zmdi zmdi-calendar-note"></i><span>Calendar</span></a></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="dropdown msg-notification">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> <i class="zmdi zmdi-email"></i>
									<div class="notify"><span class="heartbit"></span><span class="point"></span></div>
								</a>
								<ul class="dropdown-menu">
									<li class="header">Messages</li>
										<li class="body">
											<ul class="menu">
												<li> <a href="javascript:void(0);">
													<div class="icon-circle"> <img src="{{asset('assets/images/xs/avatar1.jpg')}}" alt=""> </div>
													<div class="menu-info">
														<h4>Michael</h4>
														<p class="ellipsis">Cum sociis natoque penatibus et magnis dis parturient montes</p>
													</div></a>
												 </li>
											</ul>
										</li>
										<li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
									<i class="zmdi zmdi-notifications"></i>
									<div class="notify"><span class="heartbit"></span><span class="point"></span></div>
								</a>
								<ul class="dropdown-menu">
									<li class="header">NOTIFICATIONS</li>
										<li class="body">
											<ul class="menu">
												<li><a href="javascript:void(0);">
													<div class="icon-circle bg-light-green"> <i class="material-icons">person_add</i> </div>
													<div class="menu-info">
														<h4>12 new members joined</h4>
														<p> <i class="material-icons">access_time</i> 14 mins ago </p>
													</div></a>
												</li>

												<li> <a href="javascript:void(0);">
													<div class="icon-circle bg-light-green"> <i class="material-icons">cached</i> </div>
													<div class="menu-info">
														<h4><b>John</b> updated status</h4>
														<p> <i class="material-icons">access_time</i> 3 hours ago </p>
													</div></a>
												</li>
											</ul>
										</li>
										<li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
								</ul>
							</li>
							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mega-menu" data-close="true">
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
									</form>
									<i class="zmdi zmdi-power"></i>
								</a>
							</li>
							<li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-sort-amount-desc"></i></a></li>
						</ul>
				</div>
			</nav><!-- #Top Bar -->
			<!--Side menu and right menu -->
			<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar"><!-- Menu -->
			<div class="menu">
				<ul class="list">
					<li><!-- User Info -->
						<div class="user-info">
							<div class="admin-image"> <img src="{{asset('assets/images/scet.jpg')}}" alt="profile img"> </div>
							<div class="admin-action-info"> <span><b>Welcome</b></span>
								<h3><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i>{{ ucfirst(Auth::user()->name) }}</a></h3>
							</div>
						</div><!-- #User Info -->
					</li>
					<li class="active open">
						<a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
					</li>
					<li>
						<a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Departments</span> </a>
						<ul class="ml-menu">
							<li><a href="{{url('add_department')}}">Add Departments</a></li>
							<li><a href="{{url('view_department')}}">View Departments</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Facultys</span> </a>
							<ul class="ml-menu">
								<li><a href="{{url('add_faculty')}}">Add Facultys</a></li>
								<li><a href="{{url('view_faculty')}}">View Facultys</a></li>
                                <li><a href="{{url('add_achivement')}}">Add Achivement</a></li>
                                <li><a href="{{url('view_achivement')}}">View Achivement</a></li>
							</ul>
					</li>
                    <li>
						<a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Students</span> </a>
						<ul class="ml-menu">
							<li><a href="{{url('add_student')}}">Add Students</a></li>
							<li><a href="{{url('add_all_student')}}">Add All Students</a></li>
							<li><a href="{{url('view_student')}}">View Students</a></li>
						</ul>
					</li>
                    <li>
						<a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment-account"></i><span>Attendences</span> </a>
						<ul class="ml-menu">
							<li><a href="{{url('add_attendence')}}">Add Attendences</a></li>
							<li><a href="{{url('view_attendence')}}">View Attendences</a></li>
						</ul>
					</li>
                    <li>
						<a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-border-outer"></i><span>Semesters</span> </a>
							<ul class="ml-menu">
								<li><a href="{{url('add_semester')}}">Add Semesters</a></li>
								<li><a href="{{url('view_semester')}}">View Semesters</a></li>
							</ul>
					</li>
                    <li>
						<a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Subjects</span> </a>
						<ul class="ml-menu">
							<li><a href="{{url('add_subject')}}">Add Subjects</a></li>
							<li><a href="{{url('view_subject')}}">View Subjects</a></li>
						</ul>
					</li>
                    <li>
						<a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment-o"></i><span>Assignments</span> </a>
						<ul class="ml-menu">
							<li><a href="{{url('add_assignment')}}">Add Assignments</a></li>
							<li><a href="{{url('view_assignment')}}">View Assignments</a></li>
						</ul>
					</li>
					<li>
						<a href="{{url('report')}}" ><i class="zmdi zmdi-receipt"></i><span>Reports</span> </a>
					</li>
					<li>
						<a href="{{url('all_absent')}}" ><i class="zmdi zmdi-accounts-list"></i><span>All Absent</span> </a>
					</li>
				    <li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mega-menu" data-close="true">
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
									</form>
									<i class="zmdi zmdi-power"><span>Logout</span></i>
						</a>
					</li>
				</ul>
			</div><!-- #Menu -->
		</aside>
			@yield('contain')
		</div>
		</div>
	</body>
</html>
