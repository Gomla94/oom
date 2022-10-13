<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="student">{{ Helper::admin_trans('student_name') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('student_id', $students, null, ['class' => 'form-control select2', 'id' => 'student']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="month">{{ Helper::admin_trans('month') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('month_id', $months, null, ['class' => 'select2 form-control', 'id' => 'month']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="payment_status">{{ Helper::admin_trans('payment_status') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::checkbox('payment_status', 1, isset($item) && $item->payment_status ? true : false, ['class' => 'js-switch', 'style' => 'display: none;']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="payment_method">{{ Helper::admin_trans('payment_method') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('payment_method',
        [
            0       => Helper::admin_trans('choose'),
            1       => 'عن طريق السنتر',
            2       => 'فودافون كاش'
        ], null, ['class' => 'select2 form-control', 'id' => 'payment_method']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="attachement">{{ Helper::admin_trans('attachement') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::file('attachement_file', ['class' => 'form-control', 'id' => 'attachement']) !!}
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group row">
    <div class="col-md-9 col-sm-9  offset-md-3">
        <a href="{{ route('admin.' . $route . '.index') }}" class="btn btn-danger">{{ Helper::admin_trans('cancel') }}</a>
        @if(! isset($item))
        <button class="btn btn-warning" type="reset">{{ Helper::admin_trans('reset') }}</button>
        @endif
        <button type="submit" class="btn btn-success">{{ Helper::admin_trans('save') }}</button>
        @if(! isset($item))
        <button type="submit" name="new" value="1" class="btn btn-success">{{ Helper::admin_trans('save_and_new') }}</button>
        @endif
    </div>
</div>


@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ $admin_temp }}vendors/switchery/dist/switchery.min.css" rel="stylesheet">
@endpush

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Switchery -->
	<script src="{{ $admin_temp }}vendors/switchery/dist/switchery.min.js"></script>

    <script type="text/javascript">
        $(function()
        {
            $('.select2').select2();
        });
    </script>
@endpush
