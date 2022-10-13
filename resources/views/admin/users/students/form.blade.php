<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="name">{{ Helper::admin_trans('name') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name',  'placeholder' => Helper::admin_trans('name'), 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="email">{{ Helper::admin_trans('email') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email',  'placeholder' => Helper::admin_trans('email')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="password">{{ Helper::admin_trans('password') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password',  'placeholder' => Helper::admin_trans('password')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="phone">{{ Helper::admin_trans('phone') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone',  'placeholder' => Helper::admin_trans('phone')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="phone">{{ Helper::admin_trans('parent_phone_number') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('parent_phone_number', null, ['class' => 'form-control', 'id' => 'parent_phone_number',  'placeholder' => Helper::admin_trans('parent_phone_number')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="address">{{ Helper::admin_trans('address') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address',  'placeholder' => Helper::admin_trans('address')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="notes">{{ Helper::admin_trans('notes') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::textarea('notes', null, ['class' => 'form-control', 'id' => 'notes',  'placeholder' => Helper::admin_trans('notes')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="group">{{ Helper::admin_trans('group') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('group_id', $groups, null, ['class' => 'form-control select2', 'id' => 'group']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="status">{{ Helper::admin_trans('student_status') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::checkbox('status', 1, isset($item) && $item->status ? true : false, ['class' => 'js-switch', 'style' => 'display: none;']) !!}
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
