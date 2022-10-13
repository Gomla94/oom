@extends('admin.layouts.app')

@section('title', 'Google')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ Helper::admin_trans('Google') }}</h3>
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
                            'route'         => 'admin.google.update',
                            'files'         => true
                        ]) !!}

                          <div class="form-group">
                                {!! Form::label('ad_mob', ' حساب جوجل') !!}
                                {!! Form::checkbox('ad_mob', 1, Google::find('ad_mob'), ['class' => 'js-switch', 'style' => 'display: none;', 'id' => 'ad_mob']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('google_id', 'رقم حساب جوجل') !!}
                                {!! Form::text('google_id', Google::find('google_id'), ['class' => 'form-control', 'id' => 'google_id']) !!}
                            </div>

                            

                            <div class="form-group">
                                {!! Form::label('add_status', 'حالة الاعلان') !!}
                                {!! Form::checkbox('add_status', 1, Google::find('add_status'), ['class' => 'js-switch', 'style' => 'display: none;', 'id' => 'add_status']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('add_code', 'شفرة الإعلان البيني') !!}
                                {!! Form::text('add_code', Google::find('add_code'), ['class' => 'form-control', 'id' => 'add_code']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('no_show', 'عدد مرات الظهور') !!}
                                {!! Form::number('no_show', Google::find('no_show'), ['class' => 'form-control', 'id' => 'no_show']) !!}
                            </div> 

                            <hr>

                            <div class="form-group">
                                {!! Form::label('banner_status', 'حالة البانر') !!}
                                {!! Form::checkbox('banner_status', 1, Google::find('banner_status'), ['class' => 'js-switch', 'style' => 'display: none;', 'id' => 'banner_status']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('banner_code', 'شفرة البانر') !!}
                                {!! Form::text('banner_code', Google::find('banner_code'), ['class' => 'form-control', 'id' => 'banner_code']) !!}
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
