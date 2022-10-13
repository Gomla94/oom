@extends('admin.layouts.app')

@section('title', $element)

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>شات {{ $chat->student->name }}</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div style="position: relative">
                    <div class="x_panel" id="chat-pannel">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box" id="chat_area">
                                        <div id="chat">
                                            @foreach ($chat->messages as $message)
                                                {{-- {{ dd($message) }} --}}
                                                @if ($message->model == 'App\Models\Student')
                                                    <div class="w-100" style="width: 100%; clear: both;">
                                                        <div class="msg msg-user">
                                                            <div class="alert alert-info">
                                                                {{ $message->details }}
                                                            </div>
                                                            <small class="text-info msg-details">{{ $message->sender . ', ' . $message->created_at->format('Y m, d') }}</small>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="w-100" style="width: 100%; clear: both;">
                                                        <div class="msg msg-admin">
                                                            <div class="alert alert-warning">
                                                                {{ $message->details }}
                                                            </div>
                                                            <small class="text-info msg-details">{{ $message->sender . ', ' . $message->created_at->format('Y m, d') }}</small>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="send_area">
                        {!! Form::open(
                        [
                            'route'     => ['admin.chats.send_message', $chat->id],
                            'method'    => 'PUT'
                        ]) !!}
                        <div class="form-row">
                            <div class="col-sm-11">
                                {!! Form::text('details', null, ['class' => 'form-control', 'placeholder' => 'إكتب الرسالة ..']) !!}
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
    <!-- /page content -->

@endsection

@push('styles')

    <style>
        #chat_area {position: relative; height: 100%;}
        #send_area
        {
            position: absolute;
            bottom: -89px;
            width: 100%;
            padding: 31px;
            background: #fff;
        }
        .msg{max-width: 60%;}
        .msg-user {float: left;}
        .msg-admin {float: right;}
        .msg .alert {margin: 0}
        .msg-user .msg-details {float: left;}
        .msg-admin .msg-details {float: right;}
    </style>

@endpush
