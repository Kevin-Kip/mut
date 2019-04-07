<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Password Reset</title>
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
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <form method="post" action="{{ route('password.submit') }}" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input class="form-control" id="email" name="email" type="email" required placeholder="Email address ..." autocomplete="false">
                    @if($errors->has('email') )
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary btn-block">RESET</button>
            </form>
            <div class="text-center">
                <p></p>
                <a class="d-block small" href="{{ route('user.signup') }}">Create Account</a>

                <p></p>
                <a class="d-block small" href="{{ route('user.signin') }}">Go to Login</a>
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
