@extends('header')
@section('contain')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Edit Students....</h1>
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
					<form action="/updatestud/{{$findstud->stud_id}}"  method="post" enctype="multipart/form-data" role="form">
					@csrf
                    {{method_field('PUT')}}
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="First Name" name="f_name" value="{{$findstud->f_name}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Middle Name" name="m_name" value="{{$findstud->m_name}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Last Name" name="l_name" value="{{$findstud->l_name}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Enrollment No" name="e_no" value="{{$findstud->e_no}}"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="2" class="form-control no-resize" placeholder="Address line" name="address" required>{{$findstud->address}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" placeholder="Date of Birth" name="dob" value="{{$findstud->dob}}"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group drop-custum">
										{{ csrf_field() }}
                                    <select class="form-control show-tick" name="gender" value="{{$findstud->gender}}"  required>
                                        <option value="">Select Gender</option>
												<option>Male</option>
												<option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group drop-custum">
										{{ csrf_field() }}
                                    <select class="form-control show-tick" name="blood_group" value="{{$findstud->blood_group}}"  required>
                                        <option value="">Select Blood_group</option>
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                            <option>AB+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                        <div class="col-sm-4 col-xs-12">
								<div class="form-group drop-custum">
									{{ csrf_field() }}
									<select class="form-control show-tick" name="department" required>
										<option value="">Select Department</option>
											@foreach ($departments as $dept)
										    <option  value="{{ $dept->dept_id}}" {{ $findstud->dept_id==$dept->dept_id ?"selected":'' }}>{{ $dept->depart_short_name}}</option>
											@endforeach
									</select>
								</div>
							</div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group drop-custum">
										{{ csrf_field() }}
                                    <select class="form-control show-tick" name="semester" required>
                                        <option value="">Select Semester</option>
										@foreach ($semesters as $sem)
                                        <option value="{{ $sem->sem_id}}" {{ $findstud->sem_id==$sem->sem_id ?"selected":'' }}>{{ $sem->sem_name}}</option>
                                       	@endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" placeholder="Year Of Admission" name="year_admission" value="{{$findstud->year_admission}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="student phone" name="stud_phone" value="{{$findstud->stud_phone}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="parent phonr" name="par_phone" value="{{$findstud->par_phone}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Enter Your Email"name="email" value="{{$findstud->email}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6 col-xs-12">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-raised g-bg-blush2">Submit</button>
                            <button type="reset" class="btn btn-raised g-bg-blush2">Reset</button>
                        </div>
                    </div>
					</form>
				</div>
			</div>
		</div>
    </div>
</section>
@endsection
