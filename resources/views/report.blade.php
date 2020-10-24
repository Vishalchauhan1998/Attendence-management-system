@extends('header')
@section('contain')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Report Generate</h1>
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
					<form action="/report"  method="post" enctype="multipart/form-data" role="form">
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
									
                                    <select class="form-control show-tick" name="subject" id="sub_id" required>
                                        <option value="">Select Subject</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group drop-custum">
										
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
                                        <input type="text" class="datepicker form-control" placeholder="Choose Date" name="date" data-dtp="dtp_znotk" >
                                    </div>
                                </div>
                            </div>
                        </div>          
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="price-min"><b>Attendence Count : </b></label>
                                        <input type="number" name="price-min" id="price-min" value="0" min="0" max="100">  TO 
                                        <input type="number" name="price-max" id="price-max" value="100" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <input type="submit" name="submit" class="btn btn-raised g-bg-blush2" value="Submit">
                                <button type="reset" class="btn btn-raised g-bg-blush2">Reset</button>
                            </div> 
                        </div>
                        </div>
                      
                        <div class="row clearfix">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group radio-custum">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="stud_table">
                                    <thead>
                                        <tr>
                                            <th>Enrollment No</th>
                                            <th>Student Full Name</th>
                                            <th>Total</th>
                                            <th>Attendence</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $stud)
                                        <tr>
                                            <td>{{ $stud->e_no }}</td>
                                            <td>{{ $stud->f_name}} {{ $stud->l_name}}</td>
                                            <td>{{ $stud->total }}</td>
                                            <td>{{ $stud->attend }}</td>
                                            <td>{{ $stud->per }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
					</form>
                        <div class="col-xs-12" >
                            <a href="{{url('report1')}}">
                            <button type="button" class="btn zmdi zmdi-print g-bg-blush2"> Print</button>
                            </a>
                        </div> 
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

    }else{
        $("#sub_id").html('<option value="">Select subject</option>');
        $("#stud_table")[0].tBodies[0] = "";
    }
}
</script>


@endsection
