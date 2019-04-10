@extends('admin.master')
@section('current-page')
    Semesters
@endsection
@section('isStudents')
    active
@endsection
@section('content')

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

@endsection