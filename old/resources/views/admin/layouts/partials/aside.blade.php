<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="{{ route('admin.home.index') }}" class="site_title"><img width="55" src="{{ $admin_temp }}/images/logo.png"> <span> </span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_info">
          <h2 >Hello {{ Helper::admin_user()->name }} </h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">

          <ul class="nav side-menu">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-home"></i> {{ Helper::admin_trans('home') }} </a></li>

            @admincan('roles_and_permissions')
            <li><a><i class="fa fa-user-secret"></i> {{ Helper::admin_trans('roles_permissions') }} <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('admin.roles_permissions.roles.index') }}">{{ Helper::admin_trans('roles') }}</a></li>
                <li><a href="{{ route('admin.roles_permissions.permissions.index') }}">{{ Helper::admin_trans('permissions') }}</a></li>
              </ul>
            </li>
            @endadmincan

            <li>
              <a><i class="fa fa-users"></i> {{ Helper::admin_trans('users') }} {!! Helper::alert('Student') !!} <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                @admincan('admins')
                <li><a href="{{ route('admin.users.admins.index') }}">{{ Helper::admin_trans('admins') }}</a></li>
                @endadmincan
                @admincan('students')
                <li><a href="{{ route('admin.users.students.index') }}">{{ Helper::admin_trans('students') }} {!! Helper::alert('Student') !!}</a></li>
                @endadmincan
              </ul>
            </li>

            @admincan('alerts')
            <li><a href="{{ route('admin.alerts.index') }}"><i class="fa fa-bell-o"></i> {{ Helper::admin_trans('alerts') }} </a></li>
            @endadmincan
            @admincan('messages')
            <li><a href="{{ route('admin.chats.index') }}"><i class="fa fa-envelope-o"></i> {{ Helper::admin_trans('messages') }} {!! Helper::unread_msgs() !!}</a></li>
            @endadmincan
            @admincan('messages')
            <li><a href="{{ route('admin.grades.index') }}"><i class="fa fa-graduation-cap"></i> {{ Helper::admin_trans('grades') }} </a></li>
            @endadmincan

            @admincan('groups')
            <li><a href="{{ route('admin.groups.index') }}"><i class="fa fa-signal"></i> {{ Helper::admin_trans('groups') }} </a></li>
            @endadmincan
            @admincan('months')
            <li><a href="{{ route('admin.months.index') }}"><i class="fa fa-table"></i> {{ Helper::admin_trans('add_months') }} </a></li>
            @endadmincan
            @admincan('subscriptions')
            <li>
              <a href="{{ route('admin.subscriptions.index') }}"><i class="fa fa-dollar"></i>
                {{ Helper::admin_trans('validat-subscriptions') }} {!! Helper::alert('SubscriptionRequest', 'viewed_status') !!}
              </a>
            </li>
            @endadmincan
            @admincan('questions')
            <li><a href="{{ route('admin.questions.index') }}"><i class="fa fa-question"></i> {{ Helper::admin_trans('questions_bank') }} </a></li>
            @endadmincan
            @admincan('lessons')
            <li><a href="{{ route('admin.lessons.index') }}"><i class="fa fa-university"></i> {{ Helper::admin_trans('add_lessons') }} </a></li>
            @endadmincan
            @admincan('tests')
            <li><a href="{{ url('dashboard/test') }}"><i class="fa fa-book"></i> {{ Helper::admin_trans('tests') }} {!! Helper::alert('Test', 'view_status') !!} </a></li>
            @endadmincan
            @admincan('google')
            <li><a href="{{ route('admin.google.index') }}"><i class="fa fa-google"></i> إعلانات جوجل  </a></li>
            @endadmincan

          </ul>
        </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">

        <a data-toggle="tooltip" data-placement="top" @if(Helper::admin_user()->can('settings')) style="width: 50%;" @else style="width:100%" @endif title="تسجيل الخروج" onclick="$('#logout').submit()" href="javascript:void(0)">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
         @admincan('settings')
        <a data-toggle="tooltip" data-placement="top" style="width: 50%;" title="الإعدادات" href="{{ route('admin.settings.index') }}">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
              @endadmincan

      </div>
      <!-- /menu footer buttons -->
    </div>
</div>
