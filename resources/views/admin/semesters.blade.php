@extends('admin.master')
@section('current-page')
    Semesters
@endsection
@section('isSemesters')
    active
@endsection
@section('content')
    <div class="text-white">
        <a class="btn btn-primary" href="{{ url('/admin') }}">
            <i class="fa fa-plus"></i>
            New Session
        </a>
    </div>
    <p></p>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Recent Semesters</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Academic Year</th>
                        <th>Semester</th>
                        <th>Registered Students</th>
                        <th>Non-Registered Students</th>
                        <th>Status</th>
                        <th>Start date</th>
                        <th>End Date</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Academic Year</th>
                        <th>Semester</th>
                        <th>Registered Students</th>
                        <th>Non-Registered Students</th>
                        <th>Status</th>
                        <th>Start date</th>
                        <th>End Date</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011/01/25</td>
                        <td>$112,000</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>TODO--}}
    </div>

@endsection