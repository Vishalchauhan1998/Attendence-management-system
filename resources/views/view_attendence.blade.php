@extends('header')
@section('contain')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>View Attendences</h2>
            <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
        </div>
        <!-- Basic Examples -->
       <div class="row clearfix">
            <div  class="col-xs-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>View Attendences</h2>
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
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Department</th>
                                    <th>Semester</th>
                                    <th>Subject</th>
                                    <th>Student</th>
                                    <th>Date</th>
                                    <th>Attendences</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach ($attendences as $atte)
                                <tr>
                                    <td>{{ $atte->atte_id}}</td>
                                    <td>{{ $atte->depart_short_name}}</td>
                                    <td>{{ $atte->sem_name}}</td>
                                    <td>{{ $atte->sub_name}}</td>
                                    <td>{{ $atte->f_name .' '. $atte->m_name .' '. $atte->l_name }}</td>
                                    <td>{{ $atte->date}}</td>
                                    <td>{{ ($atte->attendence == 1) ? 'Present' : 'Absent' }}</td>
                                    <td>
                                        <a  class='btn bg-orange btn-circle waves-effect waves-circle waves-float zmdi zmdi-edit' href="{{$atte->atte_id.'/editattendence'}}"></a>&nbsp;
                                        <a onClick='return del()' class='btn bg-deep-orange btn-circle waves-effect waves-circle waves-float zmdi zmdi-delete' href="{{$atte->atte_id.'/delattendence'}}"></a>
                                    </td>
                                </tr>
									@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			<div class="row clearfix">
				<div class="col-xs-12 text-center">
					<a href="{{url('add_attendence')}}" class="btn btn-raised btn-info m-t-20 m-b-20">Add Attendences</a>
				</div>
			</div>
        </div>
    </div>
</section>
@endsection
