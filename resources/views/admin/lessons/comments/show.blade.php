@extends('admin.layouts.app')

@section('title', $element)

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>شات <strong>( {{ $comment->user }} )</strong></h3>
            </div>
        </div>
        <a href="{{url('lessons')}}" class="btn btn-info" style="color:#fff;float:left">الرجوع</a>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box" id="comment_area" style="height: 50vh;overflow-y:scroll;margin-bottom:80px">
                                    <div id="comment" style="width: 100%; overflow-y: hidden; overflow-x: hidden;">
                                        <div class="w-100" style="width: 100%; clear: both;">
                                            <div class="msg msg-user">
                                                <div class="alert alert-info" style="width: 100%">
                                                    {{ $comment->replies()->first()->text }}
                                                </div>
                                                <small class="text-info msg-details">{{ $comment->user . ', ' . $comment->created_at->format('Y m, d') }}</small>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <hr>
                                        <h3 class="text-center">{{ Helper::admin_trans('replies') }}</h3>
                                        @forelse ($comment->replies as $key => $reply)
                                            @if (! $loop->first)
                                                @if ($reply->model == 'App\Models\Student')
                                                    <div class="w-100" style="width: 100%; clear: both;">
                                                        <div class="msg msg-user">
                                                            <div class="alert alert-info">
                                                                {{ $reply->text }}
                                                            </div>
                                                            <small class="text-info msg-details">{{ $reply->user . ', ' . $reply->created_at->format('Y m, d') }}</small>
                                                        </div>
                                                    </div>
                                                @elseif($reply->model == 'App\Models\Admin')
                                                    <div class="w-100" style="width: 100%; clear: both;">
                                                        <div class="msg msg-admin">
                                                            <div class="alert alert-warning">
                                                                {{ $reply->text }}
                                                            </div>
                                                            <small class="text-info msg-details">{{'Admin , ' . $reply->created_at->format('Y m, d') }}</small>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @empty
                                        <h4 class="text-center">لا يوجد ردود على هذا التعليق</h4>
                                        @endforelse
                                    </div>
                                    
                                </div>
                                <div id="send_area">
                                        {!! Form::open(
                                        [
                                            'route'     => ['admin.' . $route . '.send_comment', $comment->lesson->id, $comment->id],
                                            'method'    => 'PUT'
                                        ]) !!}
                                        <div class="form-row inpu" style="  ">
                                            <div class="col-sm-11">
                                                {!! Form::text('text', null, ['class' => 'form-control', 'placeholder' => 'أكتب تعلــــيق ..']) !!}
                                                {!! Form::hidden('user_id', $comment->replies()->first()->user_id, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-sm-1">
                                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-share"></i></button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection

@push('styles')

    <style>
        #comment_area {position: relative;}
        .inpu input{
            font-weight:bolder;
        }
        #send_area
        {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .msg{max-width: 60%;}
        .msg-user {float: left;}
        .msg-admin {float: right;}
        .msg .alert {margin: 0}
        .msg-user .msg-details {float: left;}
        .msg-admin .msg-details {float: right;}
        .msg-user{
            margin:5px;
        }
    
    </style>

@endpush
