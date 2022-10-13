@extends('admin.layouts.app')

@section('title', $elements)

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ Helper::admin_trans('show', ['el' => Helper::admin_trans($elements)]) }}</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>{{ Helper::admin_trans('student') }}</th>
                                                <th>{{ Helper::admin_trans('options') }}</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @forelse ($items as $item)
                                            <tr style="font-weight: bold;">
                                                <td>
                                                    {{ $item->student->name }}
                                                    {!! ! $item->messages()->first()->admin_view ? '<span class="badge badge-danger" title="غير مقروء"><i class="fa fa-warning"></i></span>' : '' !!}
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.' . $route . '.chat', [$element => $item->id]) }}" class="btn btn-primary"><i class="fa fa-share"></i></a>    
                                                    </div>    
                                                </td>
                                            </tr>
                                            @empty
                                                <th colspan="5" class="text-center">{{ Helper::admin_trans('empty', ['el' => Helper::admin_trans($elements)]) }}</th>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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