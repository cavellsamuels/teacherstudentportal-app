<!DOCTYPE html>
<html>

<head>
    <title>Teacher Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .form-control,
        .form-control:focus,
        .btn {
            border-radius: 50px;
            background: #e0e0e0;
        }

        .assignButton {
            border-radius: 50px;
            background: gray;
            color: white;
            margin-left: 17em;
            font-weight: 500;
            width: 5em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="text-center m-5">Teacher dashboard</h1>
                @if (\Session::has('error'))
                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif

                <form method="POST" action="{{ teacher.upload }}">
                    <select class="form-control" name="" id="">
                        @foreach ($students as $student)
                            <option value="">{{ $student->first_name }} {{$student->last_name }}</option>
                        @endforeach
                    </select>
                    <br></br>
                    <input class="form-control mb-5" type="file">

                    <button class="assignButton" type="submit"> Assign </button>
                </form>

                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <a href="{{ route('teacher.logout') }}" type="submit"
                        class="ml-4 text-lg text-gray-300 dark:text-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
