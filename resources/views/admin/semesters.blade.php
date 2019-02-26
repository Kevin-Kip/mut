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

    @if('message')
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Deleted Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Unable to delete
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif

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
                                <th>
                                    <form method="post" action="{{ route('semester.delete',['id' => $semester->semester_id]) }}">
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger" value="Delete"/>
                                    </form>
                                </th>
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