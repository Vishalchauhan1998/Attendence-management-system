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
					<form action="/report1"  method="post" enctype="multipart/form-data" role="form">
					@csrf
					<div class="body">
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
                                </table>
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
@endsection
