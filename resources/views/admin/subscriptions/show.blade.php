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
                                <td>الإشتراك لشهر</td>
                                <td>:</td>
                                <td>{{ $item->month->title }}</td>
                            </tr>

                            <tr>
                                <td>طريقة الدفع</td>
                                <td>:</td>
                                <td>{{ $item->payment_method == 1 ? 'عن طريق السنتر' : 'عن طريق فودافون كاش' }}</td>
                            </tr>

                            <tr>
                                <td>حالة الدفع</td>
                                <td>:</td>
                                <td>{{ $item->payment_status ? 'تم تأكيد الدفع' : 'لم يتم تأكيد الدفع' }}</td>
                            </tr>

                            @if ($item->payment_method == 2)
                            <tr>
                                <td>مرفق إثبات الدفع</td>
                                <td>:</td>
                                <td>
                                    <a href="{{ Helper::storage_image($item->attachement) }}" target="_blank">
                                        <img src="{{ Helper::storage_image($item->attachement) }}" style="width: 20%;">
                                    </a>
                                </td>
                            </tr>
                            @endif
                        </table>

                        <a href="{{ route('admin.' . $route . '.edit', [$element => $item->id]) }}" class="btn btn-primary">{{ Helper::admin_trans('edit', ['el' => Helper::admin_trans($element)]) }}</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
