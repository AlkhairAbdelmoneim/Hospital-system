<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospital</title>

    {{-- style --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        .bg-light {
            background: #0f306f !important;
        }

        .row {
            position: absolute;
            /* left: 50%; */
            right: 50%;

        }

        .content {
            background: #ccc;
            height: 40vh;
            text-align: center;
            left: 50%;
            right: 50%;
            transform: translate(50%, 50%);
            top: 90%;
        }

        .col-md-6 {
            position: relative;
            left: 50%;
            right: 50%;
            transform: translate(-50%, -50%);
            top: 50%;
        }

        .my-btn {
            margin-bottom: 20px;
        }

    </style>
</head>

<body>

    @include('layouts.nav')


    <div class="row">
        <div class="content">
            <div class="col-md-6" class="my-button">
                <button type="button" class="my-btn btn btn-primary btn-lg">Admin</button>
                <a href="{{ route('doctor.index') }}" class="my-btn btn btn-primary btn-lg">Doctor</a>
                <button type="button" class="my-btn btn btn-primary btn-lg">Employee</button>
                <button type="button" class="my-btn btn btn-primary btn-lg">Department</button>
                <a href="{{ route('speclized.index') }}" class="my-btn btn btn-primary btn-lg">Specilization</a>

            </div>
        </div>
    </div>

    {{-- javascript --}}
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>
