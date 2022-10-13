


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Document</title>
    
    <style>

@import url('https://fonts.googleapis.com/css2?family=Tajawal&display=swap');
        /* tajawal-regular - latin */

        .student_card_wrapper {
            width: 700px;
            display:flex;
            justify-content: center;
            /* align-items: center; */
            /* background-color:green; */
            margin: auto;
            margin-bottom: 5rem;
        }
    
        .card {
            width: 100%;
            border-radius:10px;
            overflow: hidden;
            position: relative;
            font-family: 'Tajawal', sans-serif;

        }

        .card img {
           width: 100%;
           display: block;
           margin: auto;
        }
    
        .card-info{
            position: absolute;
            right: 0;
            top: 0;
            width: 50%;
            height: 100%;
            background-color: transparent;
           display: flex;
           align-items: center;
           justify-content: center;
        }
    
        .card-info .info-wrapper {
            color: rgb(255 255 255) !important;    
            -webkit-print-color-adjust: exact;   
            text-shadow: 0 0 0 #ccc;    
            text-align: center;
        }
        .card-info .info-wrapper span {
            color: rgb(255 255 255) !important;    
            -webkit-print-color-adjust: exact;    
            text-shadow: 0 0 0 #ccc; 
            
        }
        .thetitle{
            float: right;
    font-size: 15px;
        }
    


        .info-group {
            text-align: center;
        }

        .info-group:last-child {
            margin-top: unset;
        }


        .info-group p {
            direction: rtl;

        }

        .name-info p {
            font-size:1rem;
        }

        .info-group:first-child {
            /* margin-top: 3rem; */
            margin-bottom: 2rem;
        }

        .info-group:first-child p {
            /* width: 90%; */
        }

        .info-group:nth-child(2) p {
            /* width:90%; */
            /* margin-left:2rem; */
            font-size: 1rem;

        }

        .info-group:nth-child(3) p {
           margin-right:1rem;
        }

        .qr-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            background-color: transparent;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .printCardsBtn {
            display: inline-block;           
            background-color: #ccc;
            color:#fff;
            padding:1rem;
            border-radius: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    @foreach($students as $student)
    <div class="student_card_wrapper">
        <div class="card">
            <img src="{{ asset('uploads/card-copy.png') }}" alt="">
            <div class="card-info">
                <div class="info-wrapper">
                    <div class="info-group name-info">
                        <p><span class="thetitle">{{Helper::admin_trans('name')}}:</span>{{ $student->name }}</p>
                    </div>
                    <div class="info-group grade-info">
                        <p><span class="thetitle">{{Helper::admin_trans('grade')}}:</span><span>{{ $student->group->grade->title }}</span></p>
                    </div>
                    {{-- <div class="info-group group-info">
                        <p><span>{{Helper::admin_trans('group')}}:</span>{{ $student->group->title }}</p>
                    </div> --}}
                </div>
            </div>
            <div class="qr-wrapper">
                <div class="qr">
                    {!! QrCode::size(200)->generate($student->id); !!}
                </div>
            </div>
        </div>
    </div>     
    @endforeach

    <a href="#" onclick="printCards()" class="printCardsBtn">{{Helper::admin_trans('print_cards')}}</a>

    <div class="paginationLinks">
        {{ $students->links() }}
    </div>
    
    <script>
        function printCards() {
            const printCardsBtn = document.querySelector('.printCardsBtn');
            const paginationLinks = document.querySelector('.paginationLinks');
            printCardsBtn.style.display="none";
            paginationLinks.style.display="none";
            
            window.print();
            setTimeout(() => {
                printCardsBtn.style.display="inline-block";
            paginationLinks.style.display="inline";
            }, 1000);
        }
    </script>
</body>
</html>


    


