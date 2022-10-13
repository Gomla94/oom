<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="title">الســؤال</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title',  'placeholder' =>'الســؤال', 'autofocus']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="title">{{ Helper::admin_trans('lesson_title') }}</label>
    <div class="col-md-9 col-sm-9">

        {!! Form::select('lesson_id',$lessons, null, ['class' => 'form-control', 'placeholder'=>'اختر']) !!}
    </div>
</div>


<!--{{-- <div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="title">{{ Helper::admin_trans('lesson_title') }}</label>
    <div class="col-md-9 col-sm-9">
        <select name="lesson_id" class="form-control" placeholder="choose">
                <option  disabled="" readonly="readonly" selected>أختر</option>
            @foreach($lessons as $lesson)
                <option @if(Request::path() != "questions/create") @if($item->lesson_id ==  $lesson->id) selected @endif @endif value="{{$lesson->id}}">{{$lesson->title}} - {{$lesson->group->title}}</option>
            @endforeach
           
        </select>
      
        

        {{-- {!! Form::select('lesson_id',$lessons, null, ['class' => 'form-control','placeholder'=>'اختر']) !!} --}}
    </div>
</div> --}}-->

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="description">{{ Helper::admin_trans('description') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::textarea('description', null, ['class' => 'form-control .cke_rtl ', 'id' => 'description',  'placeholder' => Helper::admin_trans('description')]) !!}

    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="image">{{ Helper::admin_trans('image') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::file('image', ['class' => 'form-control', 'id' => 'image']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="title">{{ Helper::admin_trans('difficulty_level') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('difficulty_level',
        [
            0           => Helper::admin_trans('choose'),
            1           => Helper::admin_trans('easy'),
            2           => Helper::admin_trans('medium'),
            3           => Helper::admin_trans('hard'),
        ], null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="ln_solid"></div>

<h6 class="text-center">{{ Helper::admin_trans('answers') }}</h6>

<div class="form-group row">
    <label class="col-md-3 col-sm-3  control-label">
        {{ Helper::admin_trans('question_type') }}
    </label>

    <div class="col-sm-9 row">
        <div class="col-sm-6">
            <div class="radio">
                <label>
                    {!! Form::radio('type', 1, isset($item) && $item->type != 2 ? true : false, ['class' => 'question_type']) !!} {{ Helper::admin_trans('true_false') }}
                </label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="radio">
                <label>
                    {!! Form::radio('type', 2, isset($item) && $item->type == 2 ? true : false, ['class' => 'question_type']) !!} {{ Helper::admin_trans('choose_question') }}
                </label>
            </div>
        </div>
    </div>


</div>


<div id="answers_area">
    <div class="form-group row">
        <label class="col-md-3 col-sm-3  control-label">
            {{ Helper::admin_trans('right_answer') }}
        </label>

        <div class="col-sm-9 row">
            <div class="col-sm-6">
                <div class="radio">
                    <label>
                        {!! Form::radio('true_false', 1, isset($item) && $item->type == 1 ? true : false, ['class' => 'answer']) !!} {{ Helper::admin_trans('true') }}
                    </label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="radio">
                    <label>
                        {!! Form::radio('true_false', 0, isset($item) && $item->type == 0 ? true : false, ['class' => 'answer']) !!} {{ Helper::admin_trans('false') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ln_solid"></div>

<div class="form-group row">
    <div class="col-md-9 col-sm-9  offset-md-3">
        @if (Request::route()->getName() != 'admin.lessons.create')
            <a href="{{ route('admin.' . $route . '.index') }}" class="btn btn-danger">{{ Helper::admin_trans('cancel') }}</a>
            @if(! isset($item))
            <button class="btn btn-warning" type="reset">{{ Helper::admin_trans('reset') }}</button>
            @endif
            <button type="submit" class="btn btn-success" id="save">{{ Helper::admin_trans('save') }}</button>
            @if(! isset($item))
            <button type="submit" name="new" value="1" class="btn btn-success">{{ Helper::admin_trans('save_and_new') }}</button>
            @endif
        @endif
    </div>
</div>



@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="{{ $admin_temp }}vendors/ckeditor/ckeditor.js"></script>

    <script type="text/javascript">
        $(function()
        {

            $('.select2').select2();


                CKEDITOR.replace('description');



            var true_false_content  = $('#answers_area').html(),
                chooses_increments  = 1,
                choose_content      = '<div class="form-group row">'+
                                            '<label class="col-form-label col-md-3 col-sm-3">'+
                                                '{{ Helper::admin_trans("chooses") }} <br>'+
                                                '<button type="button" id="add_choose" class="btn btn-success">{{ Helper::admin_trans("add_choose") }} <i class="fa fa-plus"></i></button>'+
                                            '</label>'+
                                            '<div class="col-sm-9" id="chooses">'+
                                                '<div class="choose row">'+
                                                    '<div class="col-sm-9">'+
                                                        '<textarea class="form-control .cke_rtl" id="answer" placeholder="الإجابة" name="answers[' + chooses_increments + '][title]" type="text"></textarea>'+
                                                    '</div>'+
                                                    '<div class="col-sm-1">'+
                                                        '<div class="radio p-2">'+
                                                            '<label>'+
                                                                '<input type="radio" value="1" checked class="right_answer" name="answers[' + chooses_increments + '][right]">'+
                                                            '</label>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="col-sm-2">'+
                                                        '<button type="button" class="btn btn-danger delete-choose"><i class="fa fa-trash"></i></button>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>';

            @if (isset($item))

                @php
                  $chooses_increments = 0;
                @endphp

                choose_content      = '<div class="form-group row">'+
                                                '<label class="col-form-label col-md-3 col-sm-3">'+
                                                    '{{ Helper::admin_trans("chooses") }} <br>'+
                                                    '<button type="button" id="add_choose" class="btn btn-success">{{ Helper::admin_trans("add_choose") }} <i class="fa fa-plus"></i></button>'+
                                                '</label>'+
                                                '<div class="col-sm-9" id="chooses">'+
                                                    @foreach($item->answers as $answer)
                                                    @php
                                                        $chooses_increments++;
                                                    @endphp
                                                    '<div class="choose row">'+
                                                        '<div class="col-sm-9">'+
                                                            '<textarea class="form-control "  placeholder="الإجابة" name="answers[{{ $chooses_increments }}][title]" type="text" value="{{$answer->title}}">{{$answer->title}}</textarea>'+
                                                        '</div>'+
                                                        '<div class="col-sm-1">'+
                                                            '<div class="radio p-2">'+
                                                                '<label>'+
                                                                    '<input type="radio" value="1" {{ $answer->right_answer ? "checked" : ""}} class="right_answer" name="answers[{{ $chooses_increments }}][right]">'+
                                                                '</label>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="col-sm-2">'+
                                                            '<button type="button" class="btn btn-danger delete-choose"><i class="fa fa-trash"></i></button>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    @endforeach
                                                '</div>'+
                                            '</div>';
                chooses_increments  = {{ $chooses_increments }};





            @endif
            console.log(chooses_increments);





            if($('.question_type:checked').val() == 2)
            {
                $('#answers_area').html(choose_content);
                 @if (isset($chooses_increments))
                for(var answer=1; answer<{{$chooses_increments+1}}; answer++ ){
                    CKEDITOR.replace('answers['+ answer +'][title]');
                }
                @endif
            }
            else
            {
                $('#answers_area').html(true_false_content);
            }


            $(document).on('change', '.question_type', function ()
            {
                if($(this).val() == 2)
                {

                    $('#answers_area').html(choose_content);
                    CKEDITOR.replace('answers[1][title]');


                }
                else
                {
                    $('#answers_area').html(true_false_content);
                }
            });

            $(document).on('click', '.delete-choose', function ()
            {
                $(this).parent().parent().remove();
            });

            $(document).on('click', '#add_choose', function ()
            {
                chooses_increments = chooses_increments + 1;

                var single_choose       =   '<div class="choose row">'+
                                                '<div class="col-sm-9">'+
                                                    '<textarea class="form-control " placeholder="الإجابة"  name="answers[' + chooses_increments + '][title]" type="text"></textarea>'+
                                                '</div>'+
                                                '<div class="col-sm-1">'+
                                                    '<div class="radio p-2">'+
                                                        '<label>'+
                                                            '<input type="radio" value="1" class="right_answer" name="answers[' + chooses_increments + '][right]">'+
                                                        '</label>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-2">'+
                                                    '<button type="button" class="btn btn-danger delete-choose"><i class="fa fa-trash"></i></button>'+
                                                '</div>'+
                                            '</div>';
                $('#chooses').append(single_choose);

                     CKEDITOR.replace('answers['+ chooses_increments +'][title]');

            });
        });


        $(document).on('change', '.right_answer', function ()
        {
            if($(this).is(':checked'))
            {
                $('.right_answer').not(this).prop("checked", false);
            }
        });

    </script>

@endpush

