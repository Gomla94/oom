@extends('admin.layouts.app')

@section('title', $elements)

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ Helper::admin_trans('edit', ['el' => Helper::admin_trans($elements)]) }}</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title" style="border-bottom: 0;">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: block;">
                        <table class="table table-borderless table-striped table-hover">
                            <tr>
                                <td>إسم الطالب</td>
                                <td>:</td>
                                <td>{{ $item->student->name }}</td>
                            </tr>

                            <tr>
                                <td>الدرس الخاص بالإمتحان</td>
                                <td>:</td>
                                <td>{{ $item->lesson->title }}</td>
                            </tr>

                            <tr>
                                <td>النسبة المئوية</td>
                                <td>:</td>
                                <td>{{ $item->percentage }}</td>
                            </tr>
                        </table>

                        <a href="{{ url('test') }}" class="btn btn-primary">العودة لصفحة الإمتاحانات</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
