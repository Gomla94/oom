<body
	class="page-header-fixed sidemenu-closed-hidelogo  page-md header-white dark-sidebar-color logo-dark">

    <div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
                <a href="{{ url('/') }}">
						<img alt="" src="assets/img/logo.png">
						<span class="logo-default">قوم ذاكر</span> </a>
				</div>
				<!-- logo end -->
			
			
				
                <!-- start header menu -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-left">
						<!-- start notification dropdown -->
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-bell-o"></i>
								<span class="badge headerBadgeColor1"> {{ Helper::count_note() }} </span>
							</a>
							<ul class="dropdown-menu animated swing">
								<li class="external">
									<h3><span class="bold">الإشعارات</span></h3>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										@foreach(Helper::notifications() as $alertt )
										<li>
											<a href="javascript:;">
												<span class="time"> {{ Carbon\Carbon::parse($alertt->created_at)->diffForHumans()}}</span>
												<span class="details">
													<span class="notification-icon circle purple-bgcolor"><i
															class="fa fa-user o"></i></span>
													<p class="who" >الإدارة </p>{{ $alertt->title }} </span>
											</a>
										</li>
										@endforeach
									</ul>
									
								</li>
							</ul>
						</li>
						<!-- end notification dropdown -->
						<!-- start message dropdown -->
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-envelope-o"></i>
								<span class="badge headerBadgeColor2"> {{ Helper::count_msg() }} </span>
							</a>
							<ul class="dropdown-menu animated slideInDown">
								<li class="external">
									<h3><span class="bold">الرسائل</span></h3>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<li>
											<a href="#">
												<span class="photo">
													<img src="{{ asset('asset/website/assets/img/user/user2.jpg') }}" class="img-circle" alt="">
												</span>
												<span class="subject">
													<span class="from"> الإداراة </span>
													<span class="time">Just Now </span>
												</span>
												<span class="message"> Jatin I found you on LinkedIn...Jatin I found you on LinkedIn...Jatin I found you on LinkedIn...Jatin I found you on LinkedIn... </span>
											</a>
										</li>
									
									</ul>
								
								</li>
							</ul>
						</li>
						<!-- end message dropdown -->
						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<img alt="" class="img-circle " src="{{asset('mainAdmin/assets/img/user.png')}}" />
								<span class="username username-hide-on-mobile"> {{ auth()->user()->name }} </span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default animated jello">
								<li>
									{{-- <a href="user_profile.html"> --}}
									<a href="#">
										<i class="icon-user"></i> الحساب الشخصي </a>
								</li>
								
								<li>
									<a href=""
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        <i class="icon-logout"></i> تسجيل الخروج
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</li>
							</ul>
						</li>
						<!-- end manage user dropdown -->

					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll">
						<ul   class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"
							data-slide-speed="200">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
									<div class="">
										<div class="sidebar-userpic">
											<img src="{{asset('mainAdmin/assets/img/user.png')}}" class="img-responsive" alt=""> </div>
									</div>
									<div class="profile-usertitle">
										<div class="sidebar-userpic-name"> name </div>
										<div class="profile-usertitle-job"> Manager </div>
									</div>
									<div class="sidebar-userpic-btn">
										<a class="tooltips" href="user_profile.html" data-placement="top"
											data-original-title="Profile">
											<i class="material-icons">person_outline</i>
										</a>
										<a class="tooltips" href="email_inbox.html" data-placement="top"
											data-original-title="Mail">
											<i class="material-icons">mail_outline</i>
										</a>
										<a class="tooltips" href="chat.html" data-placement="top"
											data-original-title="Chat">
											<i class="material-icons">chat</i>
                                        </a>
										<a href=""
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">

                                            <i class="material-icons">input</i>
                                            <form id="logout-form" action="" method="POST" style="display: none;">
                                                @csrf
                                            </form>
										</a>
									</div>
								</div>
							</li>
							<li class="menu-heading">
								<span>-- List</span>
                            </li>

							<li  class="nav-item ">
								<a href="{{ route('months') }}" class="nav-link nav-toggle">
									<i class="fa fa-image"></i>
									<span class="title">الشهور</span>
									<span class="arrow"></span>
								</a>
							</li>
							<li  class="nav-item ">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">code</i>
									<span class="title">Wezzards</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item" >
                                    <a href="{{ url('admin/wezards/create') }}"  class="nav-link ">
											<span class="title">Add New</span>
										</a>
									</li>
									<li class="nav-item">
                                    <a href="{{ url('admin/wezards') }}" class="nav-link ">
											<span class="title">View All Wezards</span>
										</a>
									</li>
								</ul>
							</li>

                            <li  class="nav-item ">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">group</i>
									<span class="title">Users</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item" >
                                    <a href="{{ url('admin/users/create') }}"  class="nav-link ">
											<span class="title">Add User</span>
										</a>
									</li>
									<li class="nav-item">
                                    <a href="{{ url('admin/users') }}" class="nav-link ">
											<span class="title">View All Users</span>
										</a>
									</li>
								</ul>
							</li>
                            <li  class="nav-item ">
								<a href="#" class="nav-link nav-toggle">
									<i class="fa fa-user-md"></i>
									<span class="title">Specialists</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item" >
                                    <a href="{{ url('admin/specialists/create') }}"  class="nav-link ">
											<span class="title">Add Specialist</span>
										</a>
									</li>
									<li class="nav-item">
                                    <a href="{{ url('admin/specialists') }}" class="nav-link ">
											<span class="title">View All Specialist</span>
										</a>
									</li>
								</ul>
							</li>
                            <li  class="nav-item ">
								<a href="#" class="nav-link nav-toggle">
									<i class="fa fa-life-ring"></i>
									<span class="title">Training</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item" >
                                    <a href="{{ url('admin/trainings/create') }}"  class="nav-link ">
											<span class="title">Add Training Categories</span>
										</a>
									</li>
									<li class="nav-item">
                                    <a href="{{ url('admin/Videos/create') }}" class="nav-link ">
											<span class="title">Add Training Videos</span>
										</a>
									</li>
								</ul>
							</li>
                            <li  class="nav-item ">
								<a href="{{ url('admin/technical') }}" class="nav-link nav-toggle">
									<i class="fa fa-envelope"></i>
									<span class="title">Technical Message</span>
								</a>
							</li>
						</ul>
					</div>
                </div>
			</div>
            <!-- end sidebar menu -->



