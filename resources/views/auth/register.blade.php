<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Student Register</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    {{--<a class="navbar-brand" href="#">Go Home</a>--}}
    <div class="collapse navbar-collapse" id="navbarResponsive">
    </div>
</nav>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Create New Account</div>
        <div class="card-body">
            <form method="post" action="{{ route('user.signup') }}" autocomplete="off">
                {{ csrf_field() }}

                <div class="form-group row">
                    {{--<label for="first_name">First Name</label>--}}
                    <input class="form-control col-md-6" id="first_name" name="first_name" type="text" required
                           autofocus placeholder="First Name ..." autocomplete="false">
                    @if($errors->has('first_name') )
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif

                    <span>    </span>

                    {{--<label for="last_name">Last Name</label>--}}
                    <input class="form-control col-md-6" id="last_name" name="last_name" type="text" required
                           placeholder="Last Name ..." autocomplete="false">
                    @if($errors->has('last_name') )
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>

                {{--<div class="form-group">--}}
                {{--<label for="last_name">Last Name</label>--}}
                {{--<input class="form-control" id="last_name" name="last_name" type="text" required placeholder="Last Name ..." autocomplete="false">--}}
                {{--@if($errors->has('last_name') )--}}
                {{--<span class="text-danger">{{ $errors->first('last_name') }}</span>--}}
                {{--@endif--}}
                {{--</div>--}}

                <div class="form-group">
                    <label for="registration">Registration Number</label>
                    <input class="form-control" id="registration" name="registration" type="text" required
                           placeholder="e.g SC 212/0700/2020" autocomplete="false">
                    @if($errors->has('name') )
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="program">Program:</label>
                    <select class="form-control" name="program" id="program" required autofocus>
                        <option disabled selected value> -- select an option --</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->name }}">{{ $program->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('program') )
                        <span class="text-danger">{{ $errors->first('program') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="student_category">Student Category:</label>
                    <select class="form-control" name="student_category" id="student_category" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option value="1">Government Sponsored</option>
                        <option value="2">Self Sponsored</option>
                    </select>
                    @if($errors->has('student_category') )
                        <span class="text-danger">{{ $errors->first('student_category') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp"
                           required placeholder="Enter email" autocomplete="false">
                    @if($errors->has('email') )
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" required
                           placeholder="Password" autocomplete="false">
                    @if($errors->has('password') )
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">CONTINUE</button>
            </form>
            <div class="text-center">
                <p></p>
                <a class="d-block small" href="{{ route('user.signin') }}">Go to Login</a>
                {{--TODO add password reset--}}
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Page level plugin JavaScript-->
<script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin.min.js')}}"></script>
<!-- Custom scripts for this page-->
<script src="{{ asset('js/sb-admin-datatables.min.js')}}"></script>
<script src="{{ asset('js/sb-admin-charts.js')}}"></script>
</body>

</html>
