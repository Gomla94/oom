<style>
    .video{
    padding: 5px 0px;
    border: 1px solid #a093a0ee;
    margin-top: 15px;
    /* margin-bottom: 16px; */
    /* border-bottom: 1px solid; */
    border: 1px solid #a093a0ee;
    border-radius: 14px;
    }
</style>
<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="title">عنوان الدرس</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title',  'placeholder' => "عنوان الدرس", 'autofocus']) !!}
    </div>
</div>
    <div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="title">رابط إمتحان خارجي إن وجد</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('exam_link', null, ['class' => 'form-control', 'id' => 'exam_link',  'placeholder' =>  'رابط إمتحان خارجي', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="grade">{{ Helper::admin_trans('grade') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('grade_id', $grades, isset($item) ? $item->group->grade_id : null, ['class' => 'form-control select2', 'id' => 'grade']) !!}
    </div>
</div>

<div id="groups"></div>
<div id="months"></div>

{{--<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="group">{{ Helper::admin_trans('month') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('month_id', $months, null, ['class' => 'form-control select2', 'id' => 'month']) !!}
    </div>
</div>--}}

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="image">{{ Helper::admin_trans('image') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::file('image_file', ['class' => 'form-control', 'id' => 'image']) !!}
    </div>
</div>

<div class="ln_solid"></div>

<h6 class="text-center">{{ Helper::admin_trans('questions') }}</h6>

<div class="form-group row">
    <div class="col-sm-4 row">
        <label class="col-form-label col-md-3 col-sm-3">{{ Helper::admin_trans('easy_questions') }}</label>
        <div class="col-md-9 col-sm-9">
            {!! Form::number('easyno',null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-4 row">
        <label class="col-form-label col-md-3 col-sm-3">{{ Helper::admin_trans('mid_questions') }}</label>
        <div class="col-md-9 col-sm-9">
            {!! Form::number('meduimno',null, ['class' => 'form-control']) !!}
        </div>
    </div>

    
   <div class="col-sm-4 row">
        <label class="col-form-label col-md-3 col-sm-3">{{ Helper::admin_trans('hard_questions') }}</label>
        <div class="col-md-9 col-sm-9">
            {!! Form::number('hardno',null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


 {{--<div class="form-group row">
    <div class="col-sm-4 row">
        <label class="col-form-label col-md-3 col-sm-3">{{ Helper::admin_trans('easy_questions') }}</label>
        <div class="col-md-9 col-sm-9">
            {!! Form::select('questions[]', $easy, isset($item) ? $item->questions()->where('difficulty_level', 1)->get()->pluck('id', 'title') : null, ['class' => 'form-control select2', 'multiple']) !!}
        </div>
    </div>

    <div class="col-sm-4 row">
        <label class="col-form-label col-md-3 col-sm-3">{{ Helper::admin_trans('mid_questions') }}</label>
        <div class="col-md-9 col-sm-9">
            {!! Form::select('questions[]', $medium, isset($item) ? $item->questions()->where('difficulty_level', 2)->get()->pluck('id', 'title') : null, ['class' => 'form-control select2', 'multiple']) !!}
        </div>
    </div>

    
   <div class="col-sm-4 row">
        <label class="col-form-label col-md-3 col-sm-3">{{ Helper::admin_trans('hard_questions') }}</label>
        <div class="col-md-9 col-sm-9">
            {!! Form::select('questions[]', $hard, isset($item) ? $item->questions()->where('difficulty_level', 3)->get()->pluck('id', 'title') : null, ['class' => 'form-control select2', 'multiple']) !!}
        </div>
    </div>

    @if (! isset($item))
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#new_question">
        <i class="fa fa-plus"></i> {{ Helper::admin_trans('add_question') }}
    </button>
    @endif
</div>--}}

<div class="ln_solid"></div>

<h6 class="text-center">{{ Helper::admin_trans('videos') }}</h6>

@if (isset($item))

    <div class="row">
        @foreach ($item->videos as $video)
            @if ($video->provider == 'local')
             @admincan('videos_computer')
                <div class="col-sm-6 col-md-3">
                    <button class="btn btn-danger" type="button" data-id="{{ $video->id }}" onclick="if(confirm('سيتم حذف الفيديو المحدد !')) {delete_video(this)}"><i class="fa fa-trash"></i></button>
                    <video style="width: 100%; height:200px;" controls>
                        <source src="{{ Helper::storage_image($video->link) }}" type="video/mp4">
                    Your browser does not support HTML video.
                    </video>
                      <input type="text" disabled="" placeholder="عنوان الفيديو" value="{{$video->title_vid}}" class="form-control">
                </div>
                @endadmincan
            @elseif($video->provider == 'youtube')
             @admincan('videos_youtube')
            @php
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $video->link, $match)) {
                    $video_id = $match[1];
                }
            @endphp
            <div class="col-sm-6 col-md-3">
                <button class="btn btn-danger" type="button" data-id="{{ $video->id }}" onclick="if(confirm('سيتم حذف الفيديو المحدد !')) {delete_video(this)}"><i class="fa fa-trash"></i></button>
                <iframe style="width: 100%; height:200px;" src="https://www.youtube.com/embed/{{ $video_id ?? ""}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <input type="text" disabled="" placeholder="عنوان الفيديو" value="{{$video->title_vid}}" class="form-control">
            </div>
            @endadmincan
                @elseif($video->provider == 'vimeo')
                 @admincan('videos_vimeo')
                    <div class="col-md-3">
                        <button class="btn btn-danger" type="button" data-id="{{ $video->id }}" onclick="if(confirm('سيتم حذف الفيديو المحدد !')) {delete_video(this)}"><i class="fa fa-trash"></i></button>
                         <iframe  style="width: 100%; height:200px;" src="https://player.vimeo.com/video/{{ $video->link }}" width="{video_width}" height="{video_height}" frameborder="0" title="{video_title}" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                          <input type="text" disabled="" placeholder="عنوان الفيديو" value="{{ $video->title_vid}}" class="form-control">
                    </div>
                    @endadmincan
                 @elseif($video->provider == 'stream')
                  @admincan('videos_streamble')
                 <div class="col-md-3">
                        <button class="btn btn-danger" type="button" data-id="{{ $video->id }}" onclick="if(confirm('سيتم حذف الفيديو المحدد !')) {delete_video(this)}"><i class="fa fa-trash"></i></button>
                         <iframe  style="width: 100%; height:200px;" src="https://streamable.com/e/{{ $video->link }}" frameborder="0"  allowfullscreen ></iframe>
                          <input type="text" disabled="" placeholder="عنوان الفيديو" value="{{$video->title_vid}}" class="form-control">
                    </div>
                    @endadmincan
                @endif
                
        @endforeach
    </div>

@endif

<div class="form-group row" style="padding: 50px 0px;">
    <label class="col-form-label col-md-3 col-sm-3" for="video">
        {{ Helper::admin_trans('video') }}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success m-2" id="add_video">
            <i class="fa fa-plus"></i> {{ Helper::admin_trans('add_video') }}
        </button>
    </label>
    <div class="col-md-9 col-sm-9">
        <div id="videos">
            <div class="video row" >
                 @admincan('videos_computer')
                <div class="col-sm-3">
                    <div class="radio">
                        <label>
                            {!! Form::radio('video_type[1]', 1, false, ['class' => 'video_type']) !!} Computer
                        </label>
                    </div>
                </div>
                @endadmincan
                 @admincan('videos_youtube')
                <div class="col-sm-3">
                    <div class="radio">
                        <label>
                            {!! Form::radio('video_type[1]', 2, false, ['class' => 'video_type']) !!} Youtube
                        </label>
                    </div>
                </div>
                @endadmincan
                 @admincan('videos_vimeo')
                <div class="col-sm-3">
                    <div class="radio">
                        <label>
                            {!! Form::radio('video_type[1]', 3, false, ['class' => 'video_type']) !!} Vimeo
                        </label>
                    </div>
                </div>
                @endadmincan
                 @admincan('videos_streamble')
                <div class="col-sm-3">
                    <div class="radio">
                        <label>
                            {!! Form::radio('video_type[1]', 4, false, ['class' => 'video_type']) !!} Streamable
                        </label>
                    </div>
                </div>
                @endadmincan
                <div class="src col-sm-12 row">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ln_solid"></div>

<h6 class="text-center">{{ Helper::admin_trans('pdf_files') }}</h6>

@if (isset($item))
    <div class="row m-5">
        @foreach ($item->files as $file)
            <div class="col-sm-3">
                <a href="javascript:void(0)" data-id="{{ $file->id }}" onclick="if(confirm('سيتم حذف الملف المحدد !')) {delete_file(this)}"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>
                <a href="{{ $file->file }}" target="_blank">
                    <img src="{{ Helper::storage_image('general/pdf.png') }}" style="width: 20%">
                </a>
            </div>
        @endforeach
    </div>
@endif

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="video">
        {{ Helper::admin_trans('pdf_file') }}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success m-2" id="add_file">
            <i class="fa fa-plus"></i> {{ Helper::admin_trans('add_file') }}
        </button>
    </label>
    <div class="col-md-9 col-sm-9">
        <div id="files">
            <div class="file row">
                <div class="src col-sm-12 row">
                    <div class="col-sm-6">
                        <div class="radio">
                            <label>
                                {!! Form::radio('file_type[1]', 1, false, ['class' => 'file_type']) !!} {{ Helper::admin_trans('file') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="radio">
                            <label>
                                {!! Form::radio('file_type[1]', 2, false, ['class' => 'file_type']) !!} {{ Helper::admin_trans('link') }}
                            </label>
                        </div>
                    </div>
                    <div class="file-or-link col-sm-10 row">
                        {{-- <div class="col-sm-6">
                            <input class="form-control" name="pdf_files[1][file]" type="file">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" name="pdf_files[1][title]" placeholder="عنوان الملف" type="text">
                        </div> --}}
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger delete_file">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="questions_ids"></div>

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


 {{--@if (! isset($item))
    @push('additional')
    <!-- Modal -->
    <div class="modal fade" id="new_question" tabindex="-1" role="dialog" aria-labelledby="new_questionLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="new_questionLabel">إضافة سؤال</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="add_question_form">
                        @csrf
                        @include('admin.questions.form')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ Helper::admin_trans('close') }}</button>
                    <button type="button" id="save" class="btn btn-success"><i class="fa fa-save"></i> {{ Helper::admin_trans('save') }}</button>
                </div>
            </div>
        </div>
    </div>
    @endpush
@endif--}}


@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>

            @if(isset($item))
                function delete_video(video)
                {
                    $.post("{{ route('admin.lessons.delete_video') }}", {id:$(video).data('id')}, function (message)
                    {
                        $(video).parent().remove();
                    })
                    .fail(function (xhr)
                    {
                        console.log('حدث خطأ ما , يرجى إعادة المحاولة مرة أخرى');
                    });
                }

                function delete_file(file)
                {
                    $.post("{{ route('admin.lessons.delete_file') }}", {id:$(file).data('id')}, function (message)
                    {
                        $(file).parent().remove();
                    })
                    .fail(function (xhr)
                    {
                        console.log('حدث خطأ ما , يرجى إعادة المحاولة مرة أخرى');
                    });
                }
            @endif

        $(function ()
        {

            $('.select2').select2();
            // Add Question

            var question_content = $('#new_question .modal-body').html(),
                questions        = [];
            $('#save').on('click', function ()
            {
                var form_data = $('#add_question_form').serializeArray();

                $.post("{{ route('admin.questions.store') }}", form_data, function (response)
                {
                    $('#new_question').modal('hide');
                    $('#new_question .modal-body').html(question_content);
                    toastr.success(response.message);
                    console.log(response.data.id);
                    var input = '<input type="hidden" name="additional_questions[]" value="'+ response.data.id + '" id="'+ response.data.id  +'" >';
                    $('.questions_ids').append(input);
                }).fail(function(response)
                {
                    toastr.error('يرجى إدخال كل الحقول المطلوبة', 'خطأ!');
                });
            });

            $(document).on('change', '#grade', function ()
            {
                $.get("{{ route('admin.lessons.get_groups') }}", {grade_id: $(this).val()}, function (response)
                {
                    var groups =    '<div class="form-group row">'+
                                        '<label class="col-form-label col-md-3 col-sm-3" for="groups">{{ Helper::admin_trans("groups") }}</label>'+
                                        '<div class="col-md-9 col-sm-9">'+
                                            '<select name="group_id" class="form-control select2" id="groups">'+
                                             '<option value="0">إختر المجموعة</option>'
                                                +'<option value="all">جميع المجموعات</option>';

                    for(var i = 0; i < response.length; i++)
                    {
                        groups += '<option value="' + response[i].id + '">' + response[i].title + '</option>';
                    }


                    groups += "</select></div></div>";

                    $("#groups").html(groups);
                    $('.select2').select2();
                });
            

            $.get("{{ route('admin.lessons.get_months') }}", {grade_id: $('#grade').val()}, function (response)
                {
                    var months =    '<div class="form-group row">'+
                                        '<label class="col-form-label col-md-3 col-sm-3" for="groups">{{ Helper::admin_trans("groups") }}</label>'+
                                        '<div class="col-md-9 col-sm-9">'+
                                            '<select name="month_id" class="form-control select2" id="months">'+
                                                '<option value="0">إختر الشهر</option>';

                    for(var i = 0; i < response.length; i++)
                    {
                        months += '<option value="' + response[i].id + '">' + response[i].title + '</option>';
                    }

                    groups += "</select></div></div>";

                    $("#months").html(months);
                    $('.select2').select2();
                });
            });
            @if(isset($item))
            var group_id = {!! json_encode($item->group_id) !!};

                $.get("{{ route('admin.lessons.get_groups') }}", {grade_id: $('#grade').val()}, function (response)
                {
                    var groups =    '<div class="form-group row">'+
                                        '<label class="col-form-label col-md-3 col-sm-3" for="groups">{{ Helper::admin_trans("groups") }}</label>'+
                                        '<div class="col-md-9 col-sm-9">'+
                                            '<select name="group_id" class="form-control select2" id="groups">';
                                              

                    for(var i = 0; i < response.length; i++)
                    {
                      
                        if(group_id ==  response[i].id  )
                        groups += '<option value="' + response[i].id + '" >' + response[i].title + '</option>';
                       
                    }
                  
                    groups += "</select></div></div>";

                    $("#groups").html(groups);
                    $('.select2').select2();
                });


                $.get("{{ route('admin.lessons.get_months') }}", {grade_id: $('#grade').val()}, function (response)
                {
                    var month_id = {!! json_encode($item->month_id) !!};

                    var months =    '<div class="form-group row">'+
                                        '<label class="col-form-label col-md-3 col-sm-3" for="groups">{{ Helper::admin_trans("groups") }}</label>'+
                                        '<div class="col-md-9 col-sm-9">'+
                                            '<select name="month_id" class="form-control select2" id="months">';
                                                //'<option value="0">إختر الشهر</option>';

                    for(var i = 0; i < response.length; i++)
                    {
                        if(month_id ==  response[i].id  )
                        months += '<option value="' + response[i].id + '" >' + response[i].title + '</option>';
                    }

                    groups += "</select></div></div>";

                    $("#months").html(months);
                    $('.select2').select2();
                });

            @endif

            var video           = '<div class="col-sm-5"><input class="form-control" name="videos[files][]" accept="video/*" type="file"></div><div class="col-sm-5"><input required="" type="text" placeholder="عنوان الفيديو" name="computer[title][]" class="form-control"></div><div class="col-sm-2"><button class="btn btn-danger delete_video"><i class="fa fa-trash"></i></button></div>',
                link            = '<div class="col-sm-5"><input class="form-control" name="videos[links][]" type="url" placeholder="Youtube link"></div><div class="col-sm-5"><input required="" type="text" placeholder="عنوان الفيديو" name="youtube[title][]" class="form-control"></div><div class="col-sm-2"><button class="btn btn-danger delete_video"><i class="fa fa-trash"></i></button></div>',
                vimeo           = '<div class="col-sm-5"><input class="form-control" name="videos[vimeo][]" type="text" placeholder="Vimeo #ID"></div><div class="col-sm-5"><input required="" type="text" placeholder="عنوان الفيديو" name="vimeo[title][]" class="form-control"></div><div class="col-sm-2"><button class="btn btn-danger delete_video"><i class="fa fa-trash"></i></button></div>',
                stream          = '<div class="col-sm-5"><input class="form-control" name="videos[stream][]" type="text" placeholder="Streamable #ID"></div><div class="col-sm-5"><input required="" type="text" placeholder="عنوان الفيديو" name="stream[title][]" class="form-control"></div><div class="col-sm-2"><button class="btn btn-danger delete_video"><i class="fa fa-trash"></i></button></div>',
                video_increment = 2,
                video_content   =   '<div class="video row">'+
                                        '@admincan("videos_computer")<div class="col-sm-3">'+
                                            '<div class="radio">'+
                                                '<label>'+
                                                    '<input type="radio" class="video_type" value="1" name="video_type[' + video_increment + ']" > Computer'+
                                                '</label>'+
                                            '</div>'+
                                        '</div>@endadmincan'+
                                        '@admincan("videos_youtube")<div class="col-sm-3">'+
                                            '<div class="radio">'+
                                                '<label>'+
                                                    '<input type="radio" class="video_type" value="2" name="video_type[' + video_increment + ']"> Youtube'+
                                                '</label>'+
                                            '</div>'+
                                        '</div>@endadmincan'+
                                         '@admincan("videos_vimeo")<div class="col-sm-3">'+
                                            '<div class="radio">'+
                                                '<label>'+
                                                    '<input type="radio" class="video_type" value="3" name="video_type[' + video_increment + ']"> Vimeo'+
                                                '</label>'+
                                            '</div>'+
                                        '</div>  @endadmincan'+
                                        '@admincan("videos_streamble")<div class="col-sm-3">'+
                                            '<div class="radio">'+
                                                '<label>'+
                                                    '<input type="radio" class="video_type" value="4" name="video_type[' + video_increment + ']"> Streamable'+
                                                '</label>'+
                                            '</div>'+
                                        '</div> @endadmincan'+
                                        '@admincan("videos_computer")<div class="src col-sm-12 row">'+
                                            '@endadmincan' + 
                                            '<div class="col-sm-2">'+
                                                '<button class="btn btn-danger delete_video"><i class="fa fa-trash"></i></button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>',
                file_increment  = Math.floor(Math.random() * 101) + Math.floor(Math.random() * 220);

            $('#add_video').click(function ()
            {
                $('#videos').append(video_content);
                video_increment += 1;
            });

            $(document).on('click', '#add_file', function ()
            {
                var file_content    =   '<div class="file row">'+
                                            '<div class="src col-sm-12 row">'+
                                                '<div class="col-sm-6">'+
                                                    '<div class="radio">'+
                                                        '<label>'+
                                                            '<input type="radio" class="file_type" value="1" name="file_type[' + file_increment + ']" checked> {{ Helper::admin_trans("file") }}'+
                                                        '</label>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-6">'+
                                                    '<div class="radio">'+
                                                        '<label>'+
                                                            '<input type="radio" class="file_type" value="2" name="file_type[' + file_increment + ']"> {{ Helper::admin_trans("link") }}'+
                                                        '</label>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="file-or-link col-sm-10 row">'+
                                                    '<div class="col-sm-6">'+
                                                        '<input class="form-control" name="pdf_files[' + file_increment + '][file]" type="file">'+
                                                    '</div>'+
                                                    '<div class="col-sm-6">'+
                                                        '<input class="form-control" name="pdf_files[' + file_increment + '][title]" placeholder="عنوان الملف" type="text">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-2">'+
                                                    '<button class="btn btn-danger delete_file">'+
                                                        '<i class="fa fa-trash"></i>'+
                                                    '</button>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>',
                file_pdf            =   '<div class="col-sm-6"><input class="form-control" name="pdf_files[' + file_increment +'][file]" type="file"></div><div class="col-sm-6"><input class="form-control" name="pdf_files[][title]" placeholder="عنوان الملف" type="text"></div>',
                file_link           =   '<div class="col-sm-6"><input class="form-control" name="pdf_files[' + file_increment + '][url]" type="text" placeholder="رابط الملف"></div><div class="col-sm-6"><input class="form-control" name="pdf_files[][title]" placeholder="عنوان الملف" type="text"></div>';

                $('#files').append(file_content);
                file_increment += 1;
            });

            $(document).on('change', '.video_type', function ()
            {
                if ($(this).val() == 1)
                {
                    $(this).parent().parent().parent().parent().find('.src').html(video);
                }
                else if($(this).val() == 2)
                {
                    $(this).parent().parent().parent().parent().find('.src').html(link);
                }else if($(this).val() == 3)
                {
                    $(this).parent().parent().parent().parent().find('.src').html(vimeo);
                }else if($(this).val() == 4)
                {
                     $(this).parent().parent().parent().parent().find('.src').html(stream);
                }
            });

            $(document).on('change', '.file_type', function ()
            {
                var file_increment      = Math.floor(Math.random() * 101) + Math.floor(Math.random() * 220),
                    file_pdf            = '<div class="col-sm-6"><input class="form-control" name="pdf_files[' + file_increment +'][file]" type="file"></div><div class="col-sm-6"><input class="form-control" name="pdf_files[' + file_increment + '][title]" placeholder="عنوان الملف" type="text"></div>',
                    file_link           = '<div class="col-sm-6"><input class="form-control" name="pdf_files[' + file_increment + '][url]" type="text" placeholder="رابط الملف"></div><div class="col-sm-6"><input class="form-control" name="pdf_files[' + file_increment + '][title]" placeholder="عنوان الملف" type="text"></div>';

                if ($(this).val() == 1)
                {
                    $(this).parent().parent().parent().parent().find('.file-or-link').html(file_pdf);
                }
                else
                {
                    $(this).parent().parent().parent().parent().find('.file-or-link').html(file_link);
                }
            });

            $(document).on('click', '.delete_video, .delete_file', function ()
            {
                $(this).parent().parent().parent().remove();
            });
        });
    </script>
@endpush

