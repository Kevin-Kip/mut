<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Portal - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{ url('/students') }}">Registration Portal</a>

    {{--<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">--}}
    {{--<i class="fas fa-bars"></i>--}}
    {{--</button>--}}

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item @yield('isSummary')">
            <a class="nav-link" href="{{ url('/students') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span>
            </a>
        </li>

        {{--<li class="nav-item @yield('isStudents')">--}}
            {{--<a class="nav-link" href="#">--}}
                {{--<i class="fas fa-fw fa-clock"></i>--}}
                {{--<span>History</span></a>--}}
        {{--</li>--}}

        <li class="nav-item @yield('isStudents')">
            @if(session()->has('user'))
                @if(session()->get('user')->role == "Student")
                    <a class="nav-link" href="{{ url('/logout') }}">
                        <i class="fas fa-fw fa-lock"></i>
                        <span>Log Out</span></a>
                @else
                    <script>window.location = "/auth/login"</script>
                @endif
            @else
                <script>window.location = "/auth/login"</script>
            @endif
        </li>
    </ul>


    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/students') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">@yield('current-page')</li>
                <li>{{ session()->get('user')->name }}</li>
            </ol>

            @if($transcript[0]->performance == "Pass" && $semester->status == 0
            && $student->fee_balance < ($semester->fees * 0.75) && !$submission)

                <div class="text-white">
                    <form action="{{ route('students.report') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="student" value="{{ $student->student_id }}">
                        <input type="hidden" name="semester" value="{{ $semester->semester_id }}">
                        <input type="submit" value="Report for Session" class="btn btn-primary" href="#">
                        <i class="fa fa-plus"></i>
                    </form>
                </div>
                <p></p>

            @else
                <p><strong>You cannot report because:</strong></p>

                <ul>
                    @if($transcript[0]->performance == "Fail")
                        <li>You failed in the last academic year</li>
                    @endif
                    @if($semester->status == 1)
                        <li>Registration period for your program has been closed</li>
                    @endif
                    @if($student->fee_balance > ($semester->fees * 0.75))
                        <li>You need to pay at least 75% of school fees and clear previous balances to proceed</li>
                    @endif
                    @if($submission)
                            <li>You have already reported for this semester</li>
                    @endif
                </ul>

            @endif
            {{--@yield('content')--}}

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin.min.js')}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>

</body>

</html>
