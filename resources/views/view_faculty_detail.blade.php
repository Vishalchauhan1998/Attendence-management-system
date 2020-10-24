@extends('header')
@section('contain')

<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
			<h2>View Faculty Profile....</h2>
            <small class="text-muted">Welcome to  application</small>
        </div>
		<div class="row clearfix">
         {{-- {{ $findfact->fname }} --}}
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class=" card patient-profile">
                    <img src='{{ asset($findfact->proflie)}}' class="img-responsive" alt="">
                </div>
                <div class="card">
                    <div class="header">
                        <h2>About Faculty</h2>
                    </div>
					<div class="body">
                        <strong>Name</strong>
						<p>{{$findfact->position}}.{{$findfact->fname}} {{$findfact->lname}}</p>
						<strong>Department</strong>
						<p>{{$findfact->depart_full_name}}</p>
						<strong>Email ID</strong>
						<p>{{$findfact->email}}</p>
						<strong>Phone</strong>
						<p>{{$findfact->phone}}</p>
						<hr>
						<strong>Qualification</strong>
                        <p>{{$findfact->Qualification}}</p>
						<strong>exprience</strong>
						<p>{{$findfact->exprience}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#report" data-toggle="tab" aria-expanded="false"><h3>Achivements</h3></a></li>
                            <!--<li role="presentation" class=""><a href="#timeline" data-toggle="tab" aria-expanded="true">Activities</a></li>-->
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="report">
                                <div class="wrap-reset">
                                    <div class="mypost-list">
                                        <h4>Research Publication National:</h4>
                                        <ul class="dis">
                                        @foreach($findachivement as $achivement)
                                            @if($achivement->Activty_Type =='Research Publication National:')
                                                <li> {{$achivement->Add_Details}}</li>
                                             @endif
                                        @endforeach
                                        </ul>
                                        <hr>
										<h4>Research Publication Intnational:</h4>
                                        <ul class="dis">
                                            @foreach($findachivement as $achivement)
                                            @if($achivement->Activty_Type =='Research Publication Intnational:')
                                                <li> {{$achivement->Add_Details}}</li>
                                             @endif
                                        @endforeach
                                        </ul>
                                        <hr>
										<h4>Expert lecture delivered:</h4>
                                        <ul class="dis">
                                            @foreach($findachivement as $achivement)
                                            @if($achivement->Activty_Type =='Expert lecture delivered:')
                                                <li> {{$achivement->Add_Details}}</li>
                                             @endif
                                        @endforeach
                                        </ul>
                                        <hr>
                                       	<h4>Workshop / Seminar / STTP:</h4>
                                        <ul class="dis">
                                            @foreach($findachivement as $achivement)
                                            @if($achivement->Activty_Type =='Workshop / Seminar / STTP:')
                                                <li> {{$achivement->Add_Details}}</li>
                                             @endif
                                        @endforeach
                                        </ul>
                                        <hr>
										<h4>Administrative / Departmental Duties:</h4>
                                        <ul class="dis">
                                            @foreach($findachivement as $achivement)
                                            @if($achivement->Activty_Type =='Administrative / Departmental Duties:')
                                                <li> {{$achivement->Add_Details}}</li>
                                             @endif
                                        @endforeach
                                        </ul>
                                        <hr>
										<h4>Membership of Professional Bodies:</h4>
                                        <ul class="dis">
                                            @foreach($findachivement as $achivement)
                                            @if($achivement->Activty_Type =='Membership of Professional Bodies:')
                                                <li> {{$achivement->Add_Details}}</li>
                                             @endif
                                        @endforeach
                                        </ul>
                                        <hr>
                                        <h4>Achievements / Awards:</h4>
                                        <ul class="dis">
                                            @foreach($findachivement as $achivement)
                                            @if($achivement->Activty_Type =='Achievements / Awards:')
                                                <li> {{$achivement->Add_Details}}</li>
                                             @endif
                                        @endforeach
                                        </ul>
                                        <hr>
                                        <h4>Participation in other activities:</h4>
                                        <ul class="dis">
                                            @foreach($findachivement as $achivement)
                                            @if($achivement->Activty_Type =='Participation in other activities:')
                                                <li> {{$achivement->Add_Details}}</li>
                                             @endif
                                        @endforeach
                                        </ul>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     </div>
</section>
@endsection
