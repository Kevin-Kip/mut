@extends('admin.master')
@section('current-page')
    Dashboard
@endsection
@section('isSummary')
    active
@endsection
@section('content')
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">{{ $activeSems }} Active Sessions</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.semesters') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">11 Registered Students</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
            {{--<div class="card text-white bg-success o-hidden h-100">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="card-body-icon">--}}
                        {{--<i class="fas fa-fw fa-shopping-cart"></i>--}}
                    {{--</div>--}}
                    {{--<div class="mr-5">123 New Orders!</div>--}}
                {{--</div>--}}
                {{--<a class="card-footer text-white clearfix small z-1" href="#">--}}
                    {{--<span class="float-left">View Details</span>--}}
                    {{--<span class="float-right">--}}
                    {{--<i class="fas fa-angle-right"></i>--}}
                  {{--</span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
            {{--<div class="card text-white bg-danger o-hidden h-100">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="card-body-icon">--}}
                        {{--<i class="fas fa-fw fa-life-ring"></i>--}}
                    {{--</div>--}}
                    {{--<div class="mr-5">13 New Tickets!</div>--}}
                {{--</div>--}}
                {{--<a class="card-footer text-white clearfix small z-1" href="#">--}}
                    {{--<span class="float-left">View Details</span>--}}
                    {{--<span class="float-right">--}}
                    {{--<i class="fas fa-angle-right"></i>--}}
                  {{--</span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

    <!-- Area Chart Example-->
    {{--<div class="card mb-3">--}}
        {{--<div class="card-header">--}}
            {{--<i class="fas fa-chart-area"></i>--}}
            {{--Area Chart Example</div>--}}
        {{--<div class="card-body">--}}
            {{--<canvas id="myAreaChart" width="100%" height="30"></canvas>--}}
        {{--</div>--}}
        {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
    {{--</div>--}}

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Recent Semesters</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Academic Year</th>
                        <th>Program</th>
                        <th>Semester</th>
                        {{--<th>Registered Students</th>--}}
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Academic Year</th>
                        <th>Program</th>
                        <th>Semester</th>
                        {{--<th>Registered Students</th>--}}
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if("semesters")
                        @foreach($semesters as $semester)
                            <tr>
                                <td>{{ $semester->academic_year }}</td>
                                <td>{{ $semester->program }}</td>
                                <td>{{ $semester->number }}</td>
                                {{--<td>65%</td>--}}
                                <td>
                                    @if ($semester->status == 0)
                                        <span class="badge badge-pill badge-success">Open</span>
                                    @elseif($semester-> status == 1)
                                        <span class="badge badge-pill badge-danger">Closed</span>
                                    @endif
                                </td>
                                <th><a href="#" class="btn btn-primary">Edit</a></th>
                                <th><a href="#" class="btn btn-danger">Delete</a></th>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>TODO--}}
    </div>
    @endsection