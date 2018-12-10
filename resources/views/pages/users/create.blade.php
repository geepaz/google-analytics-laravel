@extends('layouts.app')
@section('content')
<div class="card">

	<div class="card-header">
		<h4 class="card-title">Create User</h4>

		<a href="{{ route('users.index') }}" class="btn btn-warning btn-sm pull-right"><i class="material-icons md-18 align-middle">chevron_left</i> Back</a>
	</div>


	<div class="card-body">
		{!! Form::open(['route' => 'users.store']) !!}

			@include('pages.users.partials.form')

			<button class="btn btn-success">Create</button>
		{!! Form::close() !!}
	</div>

</div>
@endsection