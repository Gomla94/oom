@extends('admin.layouts.app')

@section('title', 'settings')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ Helper::admin_trans('settings') }}</h3>
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

                        {!! Form::open(
                        [
                            'method'        => 'PUT',
                            'route'         => 'admin.settings.update',
                            'files'         => true
                        ]) !!}

                            <div class="form-group">
                                {!! Form::label('about', 'عن التطبيق') !!}
                                {!! Form::textarea('about', Settings::find('about'), ['class' => 'form-control', 'id' => 'about']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('phone', 'رقم الهاتف') !!}
                                {!! Form::text('phone', Settings::find('phone'), ['class' => 'form-control', 'id' => 'phone']) !!}
                            </div> 
                            <div class="form-group">
                                {!! Form::label('phone', 'رقم الواتساب ') !!}
                                {!! Form::text('whats', Settings::find('whats'), ['class' => 'form-control', 'id' => 'whats']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('banner_image', 'صورة البانر') !!}
                                {!! Form::file('banner_image', ['class' => 'form-control', 'id' => 'banner_image']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('banner_status', 'حالة البانر') !!}
                                {!! Form::checkbox('banner_status', 1, Settings::find('banner_status'), ['class' => 'js-switch', 'style' => 'display: none;', 'id' => 'banner_status']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('number', 'عدد المرات') !!}
                                {!! Form::number('number', Settings::find('number'), ['class' => 'form-control', 'id' => 'number']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('time', 'المدة بالثواني') !!}
                                {!! Form::number('time', Settings::find('time'), ['class' => 'form-control', 'id' => 'time']) !!}
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="{{ route('admin.home.index') }}" class="btn btn-danger">{{ Helper::admin_trans('cancel') }}</a>
                                    <button type="submit" class="btn btn-success">{{ Helper::admin_trans('send') }}</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection


@push('styles')
<link href="{{ $admin_temp }}vendors/switchery/dist/switchery.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Switchery -->
	<script src="{{ $admin_temp }}vendors/switchery/dist/switchery.min.js"></script>
@endpush
