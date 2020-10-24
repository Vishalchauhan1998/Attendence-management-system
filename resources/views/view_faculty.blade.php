@extends('header')
@section('contain')

<section class="content">
		<div class="container-fluid">
			<div class="block-header">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<h2>View Facultys...</h2>
						<small class="text-muted">Welcome to  application</small>
					</div>
				</div>
			</div>
			<div class="row clearfix">
				@foreach ($facultys as $fact)
				<div class="col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="member-card verified">
                            <ul class="header-dropdown">
                                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{$fact->f_id.'/editfaculty'}}" class=" waves-effect waves-block">Edit</a></li>
                                        <li><a href="{{$fact->f_id.'/delfaculty'}}" class=" waves-effect waves-block">Delete</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="thumb-xl member-thumb">
                                    <img src='{{ $fact->proflie}}' class="img-circle" alt="profile-image">
                                    <i class="zmdi zmdi-info" title="Permanent"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="s-profile">
                                    <h4 class="m-b-5">{{ $fact->fname}} {{ $fact->lname}}</h4>
                                    <p class="text-muted">{{ $fact->area_interest}}<span> <a href="{{ $fact->email}}" class="text-pink">{{ $fact->email}}</a> </span></p>
                                    <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
										  <a href="{{'/view_faculty_profile/'.$fact->f_id}}"  class="btn btn-raised btn-info m-t-20 m-b-20">View Profile</a>
										  <!--<a  class='btn bg-orange btn-circle waves-effect waves-circle waves-float zmdi zmdi-edit' href="{{$fact->f_id.'/editfaculty'}}"></a>&nbsp;
										  <a onClick='return del()' class='btn bg-deep-orange btn-circle waves-effect waves-circle waves-float zmdi zmdi-delete' href="{{$fact->f_id.'/delfaculty'}}"></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				@endforeach
			</div>
			<div class="row clearfix">
				<div class="col-xs-12 text-center">
					<a href="{{url('add_faculty')}}" class="btn btn-raised btn-info m-t-20 m-b-20">Add Facultys</a>
				</div>
			</div>
    </div>
</section>
@endsection
