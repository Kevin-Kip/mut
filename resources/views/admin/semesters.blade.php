@extends('admin.master')
@section('current-page')
    Semesters
@endsection
@section('isSemesters')
    active
@endsection
@section('content')
    <div class="text-white">
        <a class="btn btn-primary" href="{{ route('semester.create') }}">
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
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Academic Year</th>
                        <th>Program</th>
                        <th>Semester</th>
                        <th>Registered Students</th>
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
                        <th>Registered Students</th>
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
                                <td>65%</td>
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
                {{ $semesters->links() }}
            </div>
        </div>
        {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>TODO--}}
    </div>

@endsection