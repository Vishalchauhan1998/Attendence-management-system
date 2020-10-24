@extends('header')
@section('contain')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Update Achivements Details...</h1>
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
					<form action="/updateachive/{{$findachivement->Achievement_id}}"  method="post" enctype="multipart/form-data" role="form">
					@csrf
					{{method_field('PUT')}}
					<div class="body">
                        <div class="row clearfix">
								<div class="col-sm-6 col-xs-12">
                                <div class="form-group drop-custum">
										{{ csrf_field() }}
                                    <select class="form-control show-tick" name="Activtytype" required>
												<option selected="selected">{{$findachivement->Activty_Type}}</option>
												<option>Research Publication National::</option>
												<option>Research Publication Intnational:</option>
												<option>Expert lecture delivered:</option>
												<option>Workshop / Seminar / STTP:</option>
												<option>Administrative / Departmental Duties:</option>
												<option>Membership of Professional Bodies:</option>
												<option>Achievements / Awards:</option>
												<option>Participation in other activities:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group drop-custum">
										{{ csrf_field() }}
                                    <select class="form-control show-tick" name="prof_id" required>
												@foreach ($facultys as $fact)
												<option selected="selected" value="{{$fact->fname}}{{$fact->lname}}"></option>
												<option value="{{ $fact->f_id}}">{{ $fact->fname}}{{ $fact->lname}}</option>
                                       	@endforeach
                                    </select>
                                </div>
                            </div>
								 <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="3" class="form-control no-resize" placeholder="Achivements Detail" name="details" >{{$findachivement->Add_Details}}</textarea>
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
@endsection
