

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="students">{{ Helper::admin_trans('students') }}
        {!! Form::checkbox('selest_all', 1, false, ['id' => 'select_all']) !!}
    </label>
    <div class="col-md-9 col-sm-9">
        {{-- {{ dd($item->students->pluck('id')) }} --}}
        {!! Form::select('students_id[]', $students, isset($item) ? $item->students->pluck('id') : null, ['class' => 'form-control select2', 'id' => 'students', 'multiple']) !!}
    </div>
</div>


<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="subject">{{ Helper::admin_trans('subject') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'subject',  'placeholder' => Helper::admin_trans('subject'), 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="details">{{ Helper::admin_trans('details') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::textarea('details', null, ['class' => 'form-control', 'id' => 'details',  'placeholder' => Helper::admin_trans('details'), 'autofocus']) !!}
    </div>
</div>

<div class="ln_solid"></div>

<div class="form-group row">
    <div class="col-md-9 col-sm-9  offset-md-3">
        <a href="{{ route('admin.' . $route . '.index') }}" class="btn btn-danger">{{ Helper::admin_trans('cancel') }}</a>
        @if(! isset($item))
        <button class="btn btn-warning" type="reset">{{ Helper::admin_trans('reset') }}</button>
        @endif
        <button type="submit" class="btn btn-success">{{ Helper::admin_trans('send') }}</button>
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

            $("#select_all").click(function()
            {
                if($(this).is(':checked'))
                {
                    $("#students > option").prop("selected", "selected");
                    $("#students").trigger("change");
                } else {
                    $("#students > option").removeAttr("selected");
                    $("#students").trigger("change");
                }
            });

        });
    </script>

@endpush
