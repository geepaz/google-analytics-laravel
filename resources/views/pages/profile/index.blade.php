@extends('layouts.app')
@section('content')
<div class="py-2 mb-3">
	<div class="row">
		
		<div class="col-md-4">
			<div class="card">
				<img src="{{ asset('upload/profile/'.$user->image) }}" class="card-img">
				
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between mb-2">
						<a href="property.html" class="h4 text-primary-dark mb-0">{{ $user->fname }} {{ $user->lname }}</a>
					</div>
					<ul class="list-unstyled m-0">
						<li class="d-flex mb-1">
							<i class="material-icons md-18 align-middle mr-2 text-muted">email</i>
							<span>{{ $user->email }}</span>
						</li>
						<li class="d-flex mb-1">
							<i class="material-icons md-18 align-middle mr-2 text-muted">schedule</i>
							<span>Role: {{ ucfirst($user->role) }}</span>
						</li>
					</ul>
				</div>
			</div>


		</div>

		<div class="col-md-8">

			<ul class="nav nav-pills mb-2">
				<li class="nav-item">
					<a class="nav-link{{ ($title['active']=='profile') ? ' active' : '' }}" href="{{ route('profile.index') }}">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link{{ ($title['active']=='settings') ? ' active' : '' }}" href="{{ route('profile.settings') }}">Settings</a>
				</li>
			</ul>

			<div class="card card-account">
				<div class="card-body">

					@include('pages.profile.forms.'.$title['active'])

				</div>
			</div>
		</div>

	</div>
</div>

@endsection