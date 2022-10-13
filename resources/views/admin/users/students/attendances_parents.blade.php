<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <table class="table" style="width:100%;text-align:center">
        <thead>
            <tr>
                <th>{{ Helper::admin_trans('grade') }}</th>
                <th>{{ Helper::admin_trans('group') }}</th>                                                
                <th>{{ Helper::admin_trans('checkin_date') }}</th>                                                
                <th>{{ Helper::admin_trans('checkout_date') }}</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($student_attendances as $attendance)
                <tr>
                    <td>{{ $attendance->grade->title }}</td>
                    <td>{{ $attendance->group->title }}</td>
                    <td>{{ $attendance->checkin_date }}</td>
                    <td>{{ $attendance->checkout_date }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>