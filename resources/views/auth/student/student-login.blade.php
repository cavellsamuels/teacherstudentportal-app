<!DOCTYPE html>
<html>

<head>
    <title>Student Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .form-control,
        .form-control:focus {
            border-radius: 50px;
            background: #e0e0e0;
        }

        .btn {
            background-color: #04AA6D;
            color: white;
            margin-left: 17em;
            font-weight: 500;
            width: 5em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <div class="col-6 offset-3">
                <h1 class="text-center m-5">Student login</h1>

                @if (\Session::has('error'))
                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                @endif

                <form method="post" action="{{ route('student.login') }}">
                    @csrf

                    <div class="mt-3">
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email Address">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>

                        <button class="btn" type="submit"> Login </button>

                        <a href="{{ route('student.register') }} ">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
