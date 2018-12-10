@extends('layouts.app')
@section('content')

<div class="row row-projects cstm_box">

	@if(auth()->user()->role=='admin')
	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('connect.index') }}">
			<i class="material-icons text-danger md-36">dvr</i>
			<div class="mb-1">Connect Google Analytic</div>
		</a>
	</div>

	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('users.index') }}">
			<i class="material-icons text-primary md-36">contacts</i>
			<div class="mb-1">Users</div>
		</a>
	</div>
	@endif

	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('submission.index') }}">
			<i class="material-icons text-success md-36">assignment</i>
			<div class="mb-1">Submission</div>
		</a>
	</div>

	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('analytic.index') }}">
			<i class="material-icons text-success md-36">cast</i>
			<div class="mb-1">Analytic</div>
		</a>
	</div>

	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('profile.index') }}">
			<i class="material-icons text-danger md-36">account_circle</i>
			<div class="mb-1">Profile</div>
		</a>
	</div>

	<div class="col-lg-3 col-md-4 col-12">
		<a href="{{ route('profile.settings') }}">
			<i class="material-icons text-success md-36">settings</i>
			<div class="mb-1">Settings</div>
		</a>
	</div>


</div>

@endsection