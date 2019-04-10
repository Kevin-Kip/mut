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

        <li class="nav-item @yield('isStudents')">
            <a class="nav-link" href="{{ route('students.history') }}">
                <i class="fas fa-fw fa-clock"></i>
                <span>History</span></a>
        </li>

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


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Reporting History</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Program</th>
                                <th>Academic Year</th>
                                <th>Semester</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Program</th>
                                <th>Academic Year</th>
                                <th>Semester</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if("semesters")
                                @foreach($semesters as $semester)
                                    <tr>
                                        <td>{{ $semester->program }}</td>
                                        <td>{{ $semester->academic_year }}</td>
                                        <td>{{ $semester->number }}</td>
                                        <td>
                                            @if ($semester->status == 0)
                                                <span class="badge badge-pill badge-success">Open</span>
                                            @elseif($semester-> status == 1)
                                                <span class="badge badge-pill badge-danger">Closed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>TODO--}}
            </div>

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
