<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department</title>

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

    @if (Session::has('success'))
        <div class="alert alert-info">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Heads Up!</strong> {!! Session::get('success') !!}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Ops!</strong> {!! Session::get('error') !!}
        </div>
    @endif


    <div class="row">

        <div class="add" style="margin-bottom: 20px;">
            <a href="{{ route('department.create') }}" class="btn btn-primary">Add new specilization</a>
        </div>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $item)
                    <tr>


                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>

                        <td>
                            <a href="{{ route('department.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>

                            <form method="post" action="{{ route('department.destroy', $item->id) }}"
                                style="display: inline-block">
                                @csrf
                                {{ method_field('delete') }}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                            class="fa fa-trash"></i>delete</button>
                                </div>
                            </form>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
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
