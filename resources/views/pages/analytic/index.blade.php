@extends('layouts.app')
@section('content')

@if(@$analytic)

<div class="row row-projects cstm_box">

	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('analytic.premium') }}">
			<i class="material-icons text-danger md-36">dvr</i>
			<div class="mb-1">Premium Content</div>
		</a>
	</div>
	
	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('analytic.keywords') }}">
			<i class="material-icons text-danger md-36">dvr</i>
			<div class="mb-1">Keywords</div>
		</a>
	</div>
	
	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('analytic.visitors') }}">
			<i class="material-icons text-danger md-36">dvr</i>
			<div class="mb-1">Visitors</div>
		</a>
	</div>
	
	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('analytic.landing') }}">
			<i class="material-icons text-danger md-36">dvr</i>
			<div class="mb-1">Landing Pages</div>
		</a>
	</div>

</div>

<div class="py-2 mb-3">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h4 class="card-title">Site Traffic</h4>
				</div>
				<div class="card-body">
					<div class="graph" id="graph1"></div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h4 class="card-title">Top Countries by Sessions</h4>
				</div>
				<div class="card-body">
					<div class="graph" id="graph2"></div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h4 class="card-title">This Week vs Last Week</h4>
				</div>
				<div class="card-body">
					<figure class="Chartjs-figure" id="graph3"></figure>
					<ol class="Chartjs-legend" id="legend3"></ol>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h4 class="card-title">This Year vs Last Year</h4>
				</div>
				<div class="card-body">
					<figure class="Chartjs-figure" id="graph4"></figure>
					<ol class="Chartjs-legend" id="legend4"></ol>
				</div>
			</div>
		</div>
	</div>
</div>
@else

<button class="btn btn-danger btn-lg btn-block">No Google Account Connected</button>

@endif

@endsection


@section('script')
@if(@$analytic)
@include('pages.analytic.graphsjs')
@endif
@endsection