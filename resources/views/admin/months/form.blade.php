<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="title">أسم الشهر</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('title', null, [ 'class' => 'form-control', 'id' => 'title',  'placeholder' => "أسم الشهر", 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="price">{{ Helper::admin_trans('price') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::number('price', null, ['class' => 'form-control', 'id' => 'price',  'placeholder' => Helper::admin_trans('price')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="grade">{{ Helper::admin_trans('grade') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('grade_id', $grades, null, ['class' => 'form-control select2', 'id' => 'grade']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="start_date">{{ Helper::admin_trans('start_date') }}</label>
    <div class="col-md-9 col-sm-9">
            <p style="color:red;font-weight:bolder;margin:0 25px;padding:0"> السنه - اليوم - الشهر </p>

        {!! Form::date('start_date', isset($item) ? $item->start_date : null, [ 'class' => 'form-control', 'id' => 'start_date',  'placeholder' => Helper::admin_trans('start_date')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="end_date">{{ Helper::admin_trans('end_date') }}</label>
    <div class="col-md-9 col-sm-9">
                    <p style="color:red;font-weight:bolder;margin:0 25px;padding:0"> السنه - اليوم - الشهر </p>

        {!! Form::date('end_date', isset($item) ? $item->end_date : null, ['class' => 'form-control', 'format'=>"YYYY/MM/DD", 'id' => 'end_date',  'placeholder' => Helper::admin_trans('end_date')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="image">صورة الدرس</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::file('image', ['class' => 'form-control', 'id' => 'image', 'accept' => 'image/*']) !!}
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
