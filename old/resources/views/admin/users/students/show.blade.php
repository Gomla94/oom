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
                        <h2 class="text-center m-5">بيانات الطالب</h2>
                        <table class="table table-borderless table-striped table-hover">
                            <tr>
                                <td>إسم الطالب</td>
                                <td>:</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <td>البريد الإلكتروني</td>
                                <td>:</td>
                                <td>{{ $item->email }}</td>
                            </tr>
                            <tr>
                                <td>رقم الهاتف</td>
                                <td>:</td>
                                <td>{{ $item->phone }}</td>
                            </tr>
                            <tr>
                                <td>الصف الدراسي</td>
                                <td>:</td>
                                <td>{{ ! is_null($item->group) ? $item->group->grade->title : 'غير مشترك' }}</td>
                            </tr>
                            <tr>
                                <td>مجموعة الدرس</td>
                                <td>:</td>
                                <td>{{ ! is_null($item->group) ? $item->group->title : 'غير مشترك' }}</td>
                            </tr>
                            <tr>
                                <td>الشهر</td>
                                <td>:</td>
                                <td>{{$item->months->first()->title ?? "غير مشترك" }}</td>
                            </tr>
                        </table>

                        <div class="clearfix"></div>
                        <h2 class="text-center m-5">الأجهزة</h2>
                        <div class="card-box table-responsive">
                            <table id="datatable-fixed-header" class="table table-borderless table-striped table-hover">
                                <thead>
                                    <th>موديل الجهاز</th>
                                    <th>Mac address</th>
                                    <th>الحالة</th>
                                    <th>الخيارات</th>
                                </thead>
                                <tbody>
                                    @foreach ($item->devices as $device)
                                    <tr>
                                        <td>{{ $device->model }}</td>
                                        <td>{{ $device->mac_address }}</td>
                                        <td>{{ $device->status ? 'فعال' : 'غير فعال' }}</td>
                                        <td>
                                            {!! Form::open(
                                            [
                                                'route'     => ['admin.users.update_device', 'id' => $device->id],
                                                'method'    => 'PATCH'
                                            ]) !!}
                                            @if ($device->status )

                                                <button type="submit" name="status" value="0" class="btn btn-danger" title="تعطيل" onclick="if(! confirm('هل تريد تعطيل هذا الجهاز ؟')) {return false;}"><i class="fa fa-warning"></i></button>
                                            @else
                                                <button type="submit" name="status" value="1" class="btn btn-success" title="تفعيل" onclick="if(! confirm('هل تريد تفعيل هذا الجهاز ؟')) {return false;}"><i class="fa fa-retweet"></i></button>
                                            @endif
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <a href="{{ route('admin.' . $route . '.edit', [$element => $item->id]) }}" class="btn btn-primary">{{ Helper::admin_trans('edit', ['el' => Helper::admin_trans($element)]) }}</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection


@push('styles')
    <!-- Datatables -->

    <link href="{{ $admin_temp }}vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ $admin_temp }}vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ $admin_temp }}vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{ $admin_temp }}vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ $admin_temp }}vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datatables -->
    <script src="{{ $admin_temp }}vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{ $admin_temp }}vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{ $admin_temp }}vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ $admin_temp }}vendors/pdfmake/build/vfs_fonts.js"></script>
@endpush
