@extends('admin.master')
@section('current-page')
    New Session
@endsection
@section('isSemesters')
    active
@endsection
@section('content')
    <!-- Message Card-->
    @if('message')
        @if(session()->get('message') == "success")
            <div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> Saved Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->get('message') == "error")
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Ooops!</strong> Could not Save
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    <!-- Example DataTables Card-->
    <div class="card mb-3 col-md-10">
        <div class="card-header">
            <i class="fa fa-table"></i> New Semester</div>
        <div class="card-bodyalign-content-center">
            <div class="col-sm-12">
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="academic_year">Academic year:</label>
                        <select class="form-control" name="academic_year" id="academic_year" required autofocus>
                            <option disabled selected value> -- select an option -- </option>
                            <option>2018/2019</option>
                        </select>
                        @if($errors->has('academic-year') )
                            <span class="text-danger">{{ $errors->first('academic-year') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="program">Program:</label>
                        <select class="form-control" name="program" id="program" required autofocus>
                            <option disabled selected value> -- select an option -- </option>
                            <option value="Certificate">Certificate</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Masters">Masters</option>
                            <option value="PhD">PhD</option>
                        </select>
                        @if($errors->has('program') )
                            <span class="text-danger">{{ $errors->first('program') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="semester_no">Semester Number:</label>
                        <select class="form-control" name="semester_no" id="semester_no" required autofocus>
                            <option disabled selected value> -- select an option -- </option>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                        </select>
                        @if($errors->has('semester_no') )
                            <span class="text-danger">{{ $errors->first('semester_no') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="fees">School Fees:</label>
                        <input class="form-control" placeholder="e.g 30, 000" type="number" name="fees" id="fees" required>
                        @if($errors->has('fees') )
                            <span class="text-danger">{{ $errors->first('fees') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start of Registration:</label>
                        <input class="form-control" type="date" name="start_date" id="start_date" required>
                        @if($errors->has('start_date') )
                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input class="form-control" type="date" name="end_date" id="end_date" required>
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
                        <input type="submit" name="submit" id="submit" value="CREATE" class="col-md-4 btn btn-primary">
                    </div>
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