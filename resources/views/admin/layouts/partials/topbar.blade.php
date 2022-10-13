<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">

            <ul class="nav navbar-nav">
            </ul>
            <ul class=" navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Helper::admin_user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.auth.profile.view') }}"><i class="fa fa-user pull-right"></i>  حــسابي</a>
                        <a class="dropdown-item" onclick="$('#logout').submit()" href="javascript:void(0)"><i class="fa fa-sign-out pull-right"></i> تسجيل الخروج</a>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="notifications-btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <span class="caret"></span>
                        @if (Helper::admin_user()->unreadNotifications()->count())
                            <span class="badge bg-green notifications-badge">{{ Helper::admin_user()->unreadNotifications()->count() }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        @forelse (Helper::admin_user()->notifications->take(10) as $notification)
                        {{--$notification--}}
                        <a class="dropdown-item {{ is_null($notification->read_at) ? 'unread' : '' }}" href="{{$notification->data['url']}}">
                            <h6>{{ $notification->data['title'] }}</h6>
                           <small>{{ Str::substr($notification->data['details'], 0, 100) }}</small>
                        </a>
                        @empty
                            <a class="dropdown-item" href="javascript:void(0)">
                                <h6>لا تجود تنبيهات حتى الآن</h6>
                            </a>
                        @endforelse
                    </ul>
                </li>

                {{-- <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                        <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <div class="text-center">
                            <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
