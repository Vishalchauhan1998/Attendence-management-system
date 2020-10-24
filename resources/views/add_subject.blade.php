@extends('header')
@section('contain')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Add Subject...</h2>
            <small class="text-muted">Welcome to  application</small>
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Subject Basic Info <small>Description text here...</small> </h2>
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
					<form action="/sub"  method="post" enctype="multipart/form-data" role="form">
						@csrf
						<div class="body">
                        <div class="row clearfix">
							<div class="col-sm-6 col-xs-12">
								<div class="form-group drop-custum">
									{{ csrf_field() }}
									<select class="form-control show-tick" name="department" id="dept_id" required>
										<option value="">Select Department</option>
											@foreach ($departments as $dept)
										<option value="{{ $dept->dept_id}}">{{ $dept->depart_short_name}}</option>
											@endforeach
									</select>
								</div>
							</div>
                            <script>
                                $(document).ready(function() {
                                $('#dept_id').change(function(){
                                var deptID = $(this).val();
                                if(deptID){
                                $.ajax({
                                type:"GET",
                                url:"{{url('getdepartment')}}?dept_id="+deptID,
                                success:function(res){
                            
                                $("#sem_id").empty();
                                var html='<option>Select semester</option>';
                                $.each(res,function(key,value){
                                    
                                html+='<option value="'+key+'">'+value+'</option>';
                                });
                                $("#sems").html(html);
                                // alert(html);
                                
                                }
                                });
                                }else{
                                $("#sem_id").empty();
                                }
                                });

                                });
                            </script> 
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group drop-custum">
										{{ csrf_field() }}
                                    <select class="form-control show-tick" name="semester" id="sems" required >
                                        <option value="">Select Semester</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Subject Code" name="sub_code" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Subject Name" name="sub_name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-raised g-bg-blush2">Submit</button>
                                <button type="reset" class="btn btn-raised">Reset</button>
                            </div>
                        </div>
                    </div>
					</form>
				</div>
			</div>
		</div>
    </div>
</section>
@endsection
