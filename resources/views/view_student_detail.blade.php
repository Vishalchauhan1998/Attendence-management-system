@extends('header')
@section('contain')

<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
			<h2>View Student Details....</h2>
            <small class="text-muted">Welcome to  application</small>
        </div>
		<div class="row clearfix">
		 @foreach($findstud as $stud)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class=" card patient-profile">
                    <img src='{{ asset($stud->profile)}}' class="img-responsive" alt="" >
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
				<div class="card">
					<div class="body">
						<ul class="nav nav-tabs tab-nav-right" role="tablist">
							<li role="presentation" class="active"><a href="#report" data-toggle="tab" aria-expanded="false"><h3>Students Details...</h3></a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="report">
								<div class="wrap-reset">
									<div class="mypost-list">
										<strong>Student  Full Name:</strong>&nbsp;&nbsp;{{$stud->f_name}} {{$stud->m_name}} {{$stud->l_name}}
										<hr>
										 <strong>Enrollment No :</strong>&nbsp;&nbsp;{{$stud->e_no}}
										<hr>
										<strong>Department Name :</strong>&nbsp;&nbsp;{{$stud->depart_full_name}}
										<hr>
										<strong>Semester :</strong>&nbsp;&nbsp;{{$stud->sem_name }}
                                        <hr>
										<strong>Admission year :</strong>&nbsp;&nbsp;{{$stud->year_admission}}
										<hr>
										<strong>Birth Date :</strong>&nbsp;&nbsp;{{$stud->dob}}
										<hr>
										<strong>Address :</strong>&nbsp;&nbsp;{{$stud->address}}
										<hr>
										<strong>Gender :</strong>&nbsp;&nbsp;{{$stud->gender}}
										<hr>
										<strong>Blood Group :</strong>&nbsp;&nbsp;{{$stud->blood_group}}
										<hr>
										<strong>Email Id:</strong>&nbsp;&nbsp;{{$stud->email}}
										<hr>
										<strong>Student Phone No :</strong>&nbsp;&nbsp;{{$stud->stud_phone}}
										<hr>
										<strong>Parents Phone No:</strong>&nbsp;&nbsp;{{$stud->par_phone}}
										<hr>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         @endforeach
     </div>
</section>
@endsectio
