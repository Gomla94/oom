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
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: block;">
                        <br>

                        {!! Form::model($item,
                        [
                            'method'        => 'PATCH',
                            'route'         => ['admin.' . $route . '.update', $item->id],
                            'files'         => true
                        ]) !!}

                            @include('admin.' . $view . '.form')

                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
