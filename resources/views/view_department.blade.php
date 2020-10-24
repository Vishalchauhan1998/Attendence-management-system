@extends('header')
@section('contain')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>View Departments...</h2>
            <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
        </div>
        <!-- Basic Examples -->
       <div class="row clearfix">
            <div  class="col-xs-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>All Departments</h2>
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
                        <table class="table table-bordered table-striped table-hover js-basic-example ">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Department short Name</th>
                                    <th>Department Full Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
									@foreach ($departments as $department)
                                <tr>
                                    <td>{{ $department->dept_id}}</td>
										  <td>{{ $department->depart_short_name}}</td>
										  <td>{{ $department->depart_full_name}}</td>
										 <td>
												<a  class='btn bg-orange btn-circle waves-effect waves-circle waves-float zmdi zmdi-edit' href="{{$department->dept_id.'/editdepartment'}}"></a>&nbsp;
												<a onClick='return del()' class='btn bg-deep-orange btn-circle waves-effect waves-circle waves-float zmdi zmdi-delete' href="{{$department->dept_id.'/deldepartment'}}"></a>
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
					<a href="{{url('add_department')}}" class="btn btn-raised btn-info m-t-20 m-b-20">Add Departments</a>
				</div>
			</div>
        </div>
    </div>
</section>
@endsection
