<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="title">أسم الصف الدراسي</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title',  'placeholder' => "أسم الصف الدراسي", 'autofocus']) !!}
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
@endpush

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(function()
        {
            $('.select2').select2();
        });
    </script>
@endpush
