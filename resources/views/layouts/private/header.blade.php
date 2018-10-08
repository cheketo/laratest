
@if( auth()->user() )

		<header class="main-header">
			<!-- Logo -->
			<a href="{{ route( 'dashboard' ) }}" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>F</b>A</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Filo</b>Admin</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<!-- <li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-envelope-o"></i>
								<span class="label label-success">4</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 4 messages</li>
								<li>

									<ul class="menu">
										<li>
											<a href="#">
												<div class="pull-left">
													<img src="template/img/user2-160x160.jpg" class="img-circle" alt="User Image">
												</div>
												<h4>
													Support Team
													<small><i class="fa fa-clock-o"></i> 5 mins</small>
												</h4>
												<p>Why not buy a new awesome theme?</p>
											</a>
										</li>

									</ul>
								</li>
								<li class="footer"><a href="#">See All Messages</a></li>
							</ul>
						</li> -->
						<!-- Notifications: style can be found in dropdown.less -->
						<!-- <li class="dropdown notifications-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i>
								<span class="label label-warning">10</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 10 notifications</li>
								<li>

									<ul class="menu">
										<li>
											<a href="#">
												<i class="fa fa-users text-aqua"></i> 5 new members joined today
											</a>
										</li>

									</ul>
								</li>
								<li class="footer"><a href="#">View all</a></li>
							</ul>
						</li> -->
						<!-- Tasks: style can be found in dropdown.less -->
						<!-- <li class="dropdown tasks-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-flag-o"></i>
								<span class="label label-danger">9</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 9 tasks</li>
								<li>

									<ul class="menu">
										<li>
											<a href="#">
												<h3>
													Design some buttons
													<small class="pull-right">20%</small>
												</h3>
												<div class="progress xs">
													<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
															 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
														<span class="sr-only">20% Complete</span>
													</div>
												</div>
											</a>
										</li>

									</ul>
								</li>
								<li class="footer">
									<a href="#">View all tasks</a>
								</li>
							</ul>
						</li> -->
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="{{ auth()->user()->image->route }}" class="user-image" alt="User Image">
								<span class="hidden-xs">{{ auth()->user()->user }}</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="{{ auth()->user()->image->route }}" class="img-circle" alt="User Image">

									<p>
										{{ auth()->user()->user }} - {{ auth()->user()->email }}
										<small>Member since Nov. 2012</small>
									</p>
								</li>

								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-info btn-flat">Mi Perfil</a>
									</div>
									<div class="pull-right">
										<form method="POST" action="{{ route( 'logout' ) }}" id="headerLogoutForm">
							        {{ csrf_field() }}
							        <button type="button" class="btn btn-danger btn-flat" id="headerLogoutButton" name="headerLogoutButton"><i class="fa fa-sign-out"></i> Salir</button>
							      </form>
										<!-- <a href="#" class="btn btn-default btn-flat">Salir</a> -->
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<!-- <li>
							<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
						</li> -->
					</ul>
				</div>
			</nav>
		</header>

@endif
