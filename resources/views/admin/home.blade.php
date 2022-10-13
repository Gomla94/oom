@extends('admin.layouts.app')

@section('title', 'home')

@section('content')

    <!-- page content -->
    <div  class="right_col" role="main">
        <div  class="row">
            <div class="animated flipInY col-sm-4">
              <div class="tile-stats p-2">
                <div style="color:darkred;" class="icon"><i class="fa fa-users"></i>
                </div>
                <div class="count">{{  App\Models\Student::where('status', true)->count() }}</div>

                <h3>عدد الطلاب الحالين</h3>
              </div>
            </div>

            <div class="animated flipInY col-sm-4">
              <div class="tile-stats p-2">
                <div style="color:goldenrod;" class="icon"><i class="fa fa-dollar"></i>
                </div>
                <div class="count">{{ App\Models\SubscriptionRequest::where('payment_status', true)->count() }}</div>

                <h3>عدد الطلاب المشتركين</h3>
              </div>
            </div>
            <div class="animated flipInY col-sm-4">
              <div class="tile-stats p-2">
                <div style="color:lightseagreen;" class="icon"><i class="fa fa-envelope-o"></i>
                </div>
                <div class="count">{{ App\Models\Chat::get()->count() }}</div>

                <h3>الرسائل</h3>
              </div>
            </div>
        </div>

        <div class="row">
            {{-- Students --}}

           {{--  <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>الطلبة <i class="fa fa-users"></i></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div  class="x_content">
                    <ul class="list-unstyled msg_list">
                        @foreach (Helper::get('student')->take(5) as $student)
                            <li>
                                <span class="image">
                                    <img src="https://www.wjtv.com/wp-content/uploads/sites/72/2019/05/blank-2017_1559245575865_89917888_ver1.0.jpg?w=600&h=493&crop=1" alt="img" />
                                </span>
                                <div class="clearfix"></div>
                                <span  class="pr-4">
                                    <h4 style="font-weight:bold;">{{ $student->name }}</h4>
                                    <br>
                                    @if(isset($student->group->grade->title)) <small style="font-weight:bold;">{{ $student->group->grade->title }}</small>@else <small style="font-weight:bold;"></small>  @endif
                                </span>
                            </li>
                        @endforeach
                        <li>
                            <h4 style="font-weight:bold;" class="w-100 text-center">
                                <a href="{{ route('admin.users.students.index') }}">عرض كل المستخدمين</a>
                            </h4>
                        </li>
                    </ul>
                  </div>
                </div>
            </div>
 --}}
            {{-- Messages --}}

           {{--  <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>الرسائل <i class="fa fa-envelope-o"></i></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <ul class="list-unstyled msg_list">
                        @foreach (Helper::get('chat')->take(5) as $chat)
                            <li>
                                <span class="image">
                                    <img src="https://www.wjtv.com/wp-content/uploads/sites/72/2019/05/blank-2017_1559245575865_89917888_ver1.0.jpg?w=600&h=493&crop=1" alt="img" />
                                </span>
                                <div class="clearfix"></div>
                                <span class="pr-4">
                                    <h4 style="font-weight:bold;"><a href="{{ route('admin.chats.chat', ['chat' => $chat->id]) }}">{{ $chat->student->name }}</a></h4>
                                </span>
                            </li>
                        @endforeach
                        <li>
                            <h4 style="font-weight:bold;" class="w-100 text-center">
                                <a href="{{ route('admin.chats.index') }}">عرض كل الرسائل</a>
                            </h4>
                        </li>
                    </ul>
                  </div>
                </div>
            </div> --}}
        </div>
    </div>
      <!-- /page content -->

@endsection
