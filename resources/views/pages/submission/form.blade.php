@extends('layouts.app')
@section('content')
<div class="card">

	<div class="card-body">
		<h2>Content Submission Form</h2>
		@include('pages.submission.partials.'.$form)
	</div>

</div>
@endsection