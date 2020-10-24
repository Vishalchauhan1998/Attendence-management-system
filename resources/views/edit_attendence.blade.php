@extends('header')
@section('contain')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Edit Attendences...</h1>
            <small class="text-muted">Welcome to  application</small>
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Basic Information <small>Description text here...</small> </h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<form action="/updateatte"  method="post" enctype="multipart/form-data" role="form">
					@csrf
					<div class="body">
                        <div class="row clearfix">
                        <div class="col-sm-4 col-xs-12">
								<div class="form-group drop-custum">
									{{ csrf_field() }}
									<select class="form-control show-tick" name="department" id="dept_id" required onchange="get_semester(this.value)">
										<option value="">Select Department</option>
											@foreach ($departments as $dept)
										<option value="{{ $dept->dept_id}}">{{ $dept->depart_short_name}}</option>
											@endforeach
									</select>
								</div>
							</div> 
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group drop-custum">
									{{ csrf_field() }}
                                    <select class="form-control show-tick" name="semester" id="sem_id" required onchange="get_sub_stud(this.value)">
                                        <option value="">Select Semester</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12 ">
                                <div class="form-group drop-custum ">
									{{ csrf_field() }}
                                    <select class="form-control show-tick" name="subject" id="sub_id" required>
                                        <option value="">Select Subject</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group drop-custum">
										{{ csrf_field() }}
                                    <select class="form-control show-tick" name="slot" required>
                                        <option value="">Select Slot</option>
                                        <option value="1">Slot 1 (8:30 To 9:30)</option>
                                        <option value="2">Slot 2 (9:30 To 10:30)</option>
                                        <option value="3">Slot 3 (10:45 To 11:45)</option>
                                        <option value="4">Slot 4 (11:45 To 12:45)</option>
                                        <option value="5">Slot 5 (1:30 To 2:30)</option>
                                        <option value="6">Slot 6 (2:30 To 3:30)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group drop-custum">
										{{ csrf_field() }}
                                    <select class="form-control show-tick" name="class" >
                                        <option value="">Select Class</option>
												<option>Class 1</option>
												<option>class 2</option>
                                                <option>class 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" placeholder="Choose Date" name="date" data-dtp="dtp_znotk" value="{{$findatte->date}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12 col-xs-12">
                            {{ csrf_field() }}
                                <div class="form-group radio-custum">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="stud_table">
                                <thead>
                                    <tr>
                                        <th>Enrollment No</th>
                                        <th>Student Full Name</th>
                                        <th>Attendences</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                        </table>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        								<div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                            </div>
                        </div>
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-raised g-bg-blush2">Submit</button>
                                <button type="reset" class="btn btn-raised g-bg-blush2">Reset</button>
                            </div>
                        </div>
                    </div>
					</form>
				</div>
			</div>
		</div>
    </div>
</section>
<script>
function get_semester(deptID){
    if(deptID) {
        $.ajax(
        {
            type:"GET",
            url:"{{url('getdepartment')}}?dept_id="+deptID,
            success:function(res){
                $("#sem_id").empty();
                get_sub_stud();
                var html='<option value="">Select semester</option>';
                $.each(res,function(key,value)
                {            
                    html+='<option value="'+key+'">'+value+'</option>';
                });
                $("#sem_id").html(html);
                // alert(html);
            }
        });
    }else{
        $("#sem_id").html('<option value="">Select semester</option>');
    }
}

function get_sub_stud(semID){
    if(semID) {
        $.ajax(
        {
            type:"GET",
            url:"{{url('getsemester')}}?sem_id="+semID,
            success:function(res){
                $("#sub_id").empty();
                var html='<option value="">Select subject</option>';
                $.each(res,function(key,value)
                {            
                    html+='<option value="'+key+'">'+value+'</option>';
                });
                $("#sub_id").html(html);
                // alert(html)
            }
        });

        $.ajax
        ({
            type:"GET",
            url:"{{url('getstudent')}}?sem_id="+semID,
            success:function(res)
            {
                if(res)
                {
                    let stud_tbody = "";
                    $.each(res,function(index)
                    {
                        stud_tbody += `<tr>
                                <td>${res[index].e_no}</td>
                                <td>${ res[index].f_name + ' ' + res[index].m_name + ' ' + res[index].l_name }</td>
                                <td><input type = "radio" class="width-gap radio-col-green" id="Present_${res[index].stud_id}" name="attendence[${index}]" value='present_${res[index].stud_id}' checked />
                                <label class="m-1-20" for="Present_${res[index].stud_id}">Present</label>
                                <input type = "radio" class="width-gap radio-col-red" id="Absent_${res[index].stud_id}" name="attendence[${index}]" value='absent_${res[index].stud_id}' />
                                <label class="m-1-20" for="Absent_${res[index].stud_id}">Absent</label>
                                </td>
                            </tr>`;
                    });
                    $("#stud_table")[0].tBodies[0].innerHTML = stud_tbody;
                }
                else
                {
                    $("#stud_table")[0].tBodies[0] = "";
                }
            }
        });
    }else{
        $("#sub_id").html('<option value="">Select subject</option>');
        $("#stud_table")[0].tBodies[0] = "";
    }
}
</script>

@endsection
