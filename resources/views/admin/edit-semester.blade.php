@extends('admin.master')
@section('current-page')
    Update Session
@endsection
@section('isSemesters')
    active
@endsection
@section('content')
    <!-- Message Card-->
    @if('message')
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Updated Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Could not Update details
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    <!-- Example DataTables Card-->
    <div class="card mb-3 col-md-10">
        <div class="card-header">
            <i class="fa fa-table"></i> Edit Semester</div>
        <div class="card-bodyalign-content-center">
            <div class="col-sm-12">
                <form action="{{ route('semester.update', ['id' => $semester->semester_id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}

                    @if("semester")
                        <div class="form-group">
                            <label for="academic_year">Academic year:</label>
                            <select class="form-control" name="academic_year" id="academic_year" required autofocus>
                                <option disabled selected value> -- select an option -- </option>
                                @if("years")
                                    @foreach($years as $year)
                                        @if($year == $semester->academic_year)
                                        <option selected>{{ $year }}</option>
                                        @else
                                            <option>{{ $year }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->has('academic-year') )
                                <span class="text-danger">{{ $errors->first('academic-year') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="program">Program:</label>
                            <select class="form-control" name="program" id="program" required>
                                @foreach($programs as $program)
                                    @if($program->name == $semester->$program)
                                        <option value="{{ $program->name }}" selected>{{ $program->name }}</option>
                                    @else
                                        <option value="{{ $program->name }}">{{ $program->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('program') )
                                <span class="text-danger">{{ $errors->first('program') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="semester_no">Semester Number:</label>
                            <select class="form-control" name="semester_no" id="semester_no" required>
                                <option disabled selected value> -- select an option -- </option>
                                @if($semester->number == 1)
                                    <option value="1" selected>1st Semester</option>
                                @elseif($semester->number == 2)
                                    <option value="2" selected>2nd Semester</option>
                                @elseif($semester->number == 3)
                                    <option value="3" selected>3rd Semester</option>
                                @endif
                            </select>
                            @if($errors->has('semester_no') )
                                <span class="text-danger">{{ $errors->first('semester_no') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="student_category">Student Category:</label>
                            <select class="form-control" name="student_category" id="student_category" required>
                                <option disabled selected value> -- select an option -- </option>
                                @if($semester->student_category == 1)
                                    <option value="1" selected>Government Sponsored</option>
                                @elseif($semester->number == 2)
                                    <option value="2" selected>Self Sponsored</option>
                                @endif
                            </select>
                            @if($errors->has('student_category') )
                                <span class="text-danger">{{ $errors->first('student_category') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="fees">School Fees:</label>
                            <input class="form-control" placeholder="e.g 30000" value="{{ $semester->fees }}" type="number" name="fees" id="fees" required>
                            @if($errors->has('fees') )
                                <span class="text-danger">{{ $errors->first('fees') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="start_date">Start of Registration:</label>
                            <input class="form-control" type="date" value="{{ $semester->start_date }}" name="start_date" id="start_date" required>
                            @if($errors->has('start_date') )
                                <span class="text-danger">{{ $errors->first('start_date') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input class="form-control" type="date" value="{{ $semester->end_date }}" name="end_date" id="end_date" required>
                            <br>
                            @if($errors->has('end_date') )
                                <span class="text-danger">{{ $errors->first('end_date') }}</span>
                            @endif
                            <br>
                            @if("message")
                                @if(session()->get("message") == "date-error")
                                    <div class="alert alert-danger alert-dismissible show" role="alert">
                                        <p>End date should be a date after the start date</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="UPDATE" class="col-md-4 btn btn-primary">
                        </div>

                    @endif
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Your Website 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section('customScripts')--}}
{{--<script>--}}
{{--let wardList = $('#ward');--}}
{{--$("#constituency").change(function () {--}}
{{--let id = document.getElementById('constituency').value;--}}
{{--wardList.empty();--}}
{{--$.ajax({--}}
{{--'url':"/api/constituencies/"+id+"/wards",--}}
{{--'method': "GET",--}}
{{--'dataType': 'json',--}}
{{--success: function (data) {--}}
{{--wardList.append("<option disabled selected value> -- select an option -- </option>");--}}
{{--for (let i = 0; i < data.length;i++ ){--}}
{{--wardList.append("<option value='"+ data[i].ward_name +"'>"+data[i].ward_name+"</option>");--}}
{{--}--}}
{{--},--}}
{{--error: function (error) {--}}
{{--alert("An error occured. Cound not fetch wards");--}}
{{--console.log(error)--}}
{{--}--}}
{{--})--}}
{{--})--}}
{{--</script>--}}
{{--@endsection--}}