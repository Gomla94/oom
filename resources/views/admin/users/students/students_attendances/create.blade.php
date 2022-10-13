@extends('admin.layouts.app')

@section('title', $elements)

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ Helper::admin_trans('create', ['el' => Helper::admin_trans($elements)]) }}</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="student_card_wrapper">
                    <div class="card">
                        <div class="card-head">
                            <h4>{{ Helper::admin_trans('student_card') }}</h4>
                        </div>
                        <div class="card-body">
                            <form class="student_attendance_form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="student_id">{{ Helper::admin_trans('student_id') }}</label>
                                    <input type="text" id="student_id" class="form-control" placeholder="{{ Helper::admin_trans('student_id') }}" name="student_id">
                                </div>
                                <span class="response-message"></span>
                            </form>
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
    .student_card_wrapper {
        width: 100%;
        display:flex;
        justify-content: center;
        align-items: center
    }

    .card {
        width: 40%;
        border-radius:10px;
        overflow: hidden;

    }

    .card-head {
        text-align: center;
        background-color: blue;
        color: #fff;
        padding: 0.2rem;
    }

    .card-body {
       
        text-align: center;
    }

    .card-body .student-image {
        height: 25%;
        width: 25%;
        flex: 1
    }

    .response-message {
        font-size:20px;
        font-weight: 600;
    }

    .card-body .student-image img {
        height: 100%;
        width: 100%;
    }

    .card-body .student-info {
        flex: 2;
        text-align: center;
    }

    .card-body .student-info p {
        font-size: 20px;
        font-weight: 800 !important;
    }
    .card-body .student-qrcode {
        flex: 1;
    }

    .card-body .student-qrcode img {
        height: 100%;
        width: 100%;
    }


</style>
    <!-- Datatables -->

    <link href="{{ $admin_temp }}vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ $admin_temp }}vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ $admin_temp }}vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{ $admin_temp }}vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ $admin_temp }}vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datatables -->
    <script src="{{ $admin_temp }}vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{ $admin_temp }}vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{ $admin_temp }}vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{ $admin_temp }}vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ $admin_temp }}vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const studentIdInput = document.getElementById('student_id');
        const responseMessageSpan = document.querySelector('.response-message');
        studentIdInput.addEventListener('input', (event) => {
            setTimeout(() => {
                disableInput()
            }, 1500)
           
        });

        studentIdInput.addEventListener('blur', (event) => {
            StudentIdChangedHandler(event)           
        });

        function disableInput() {
            studentIdInput.setAttribute('disabled', true)
        }

        async function StudentIdChangedHandler(event) {
            event.target.removeEventListener('input', StudentIdChangedHandler)
            if(studentIdInput.value == '') return responseMessageSpan.innerText = '';

            studentIdInput.setAttribute('disabled', true)
            const response = await axios.post('{{url("/dashboard/users/students_attendances")}}',{
                'student_id':  studentIdInput.value
            });

            setTimeout(() => {
                studentIdInput.removeAttribute('disabled')
                studentIdInput.value = ''
                responseMessageSpan.innerText = ''
            }, 1500);


            responseMessageSpan.innerText = modifyResponseMessageSpan(response.data);
        }

        function modifyResponseMessageSpan(response)
        {
            if(response.error) {
                responseMessageSpan.style.color = 'red';
                return response.error

            } else {
                responseMessageSpan.style.color = 'green';
                return response.message
            }
        }
    </script>
@endpush
