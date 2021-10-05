<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>doctors</title>

    {{-- style --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        .bg-light {
            background: #0f306f !important;
        }

        .row {
            padding: 50px;
        }

    </style>
</head>

<body>

    @include('layouts.nav')


    <div class="row">
        <form action="{{ route('doctor.update', $doctor->id) }}" method="POST">
            @csrf
            {{ method_field('put') }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">First_name</label>
                    <input type="text" name="first_name" class="form-control" id="inputEmail4"
                        value="{{ $doctor->first_name }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Last_name</label>
                    <input type="text" name="last_name" class="form-control" id="inputEmail4"
                        value="{{ $doctor->last_name }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4"
                        value="{{ $doctor->email }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Address</label>
                    <input type="text" name="address" class="form-control" id="inputPassword4"
                        value="{{ $doctor->address }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Phone</label>
                <input type="text" name="phone" class="form-control" id="inputAddress" value="{{ $doctor->phone }}">
            </div>
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="inputState">Speciolization</label>
                    <select id="inputState" class="form-control" name="specioliza_id">
                        <option selected>التخصص</option>
                        <option>الانف و الحنجرة</option>
                        <option>الباطنيه</option>
                        <option>الاشعه</option>
                        <option>المخ والاعصاب</option>
                    </select>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
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
