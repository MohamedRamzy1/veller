@extends('layouts.app')
@section('messageStyle')
	@include('inc.messagestyle')
@endsection
@section('messageScript')
	@include('inc.messagescript')
@endsection
@section('mainstyle')
	@include('inc.mainstyle')
@endsection

@section('content')
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section start -->
	<header class="header-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="site-logo">
						<h2><a href="#">Your profile</a></h2>
						<p>Enhance your presence on veller</p>
					</div>
				</div>
				<div class="col-md-8 text-md-right header-buttons">
					<a href="{{route('users.edit',$id)}}" class="site-btn">Edit Profile</a>
					<a href="/message" class="site-btn">Message</a>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Hero section start -->
	<section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-6">
							<div class="hero-text">
								<h2>{{$user["name"]}}</h2>
								<p>{{$user["about"]}}.</p>
							</div>
							<div class="hero-info">
								<h2>General Info</h2>
								<ul>
									<li><span>Date of Birth</span>{{$applicant["day"]}} / {{$applicant["month"]}} / {{$applicant["year"]}} </li>
									<li><span>Address</span>{{$user["zip"]}},{{$user["city"]}},{{$user["country"]}}</li>
									<li><span>E-mail</span>{{$user["email"]}}</li>
									<li><span>Phone </span>{{$user["phone_number"]}}</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<figure class="hero-image">
								<img src='public/applicants/profile_pictures/{{$user["profile_picture"]}}' alt="profile picture">
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Resume section start -->
	<section class="resume-section with-bg spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 offset-xl-2">
					<div class="section-title">
						<h2>Education</h2>
					</div>
					<ul class="resume-list">
						@while($row = $edu->fetch_assoc())
						<li>
							<h2>Start at {{$row["start_date"]}}</h2>
							<h3>end at {{$row["end_date"]}}</h3>
							<h4>{{$row["degree"]}}</h4>
							<p>{{$row["institution"]}}</p>
						</li>
						@endwhile
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Resume section end -->

	
	<!-- Review section start -->
	<section class="review-section spad pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 offset-xl-2">
					<div class="section-title">
						<h2>Interests</h2>
					</div>
					<div class="review-slider owl-carousel">
                        @while($row2 = $ints->fetch_assoc())		
						<div class="single-review">
							<div class="qut">“</div>
							<p>{{$row2["interest"]}}. </p>
						</div>
		                @endwhile
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Review section end -->
@endsection	


	
