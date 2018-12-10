@extends('layouts.app')
@section('content')
@if(auth()->user()->role=='admin')
<div class="card">

	<div class="card-header">
		<h4 class="card-title">List Forms</h4>
	</div>

	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
					<th style="width: 120px;">Date</th>
					<th>User</th>
					<th>Email</th>
					<th style="width: 100px;">Type</th>
				</tr>
			</thead>

			<tbody>
				@foreach($submissions as $submission)
				@php($form1=json_decode($submission->form1))
				<tr>
					<td class="align-middle">{{ date('j M Y',strtotime($submission->created_at)) }}</td>
					<td class="align-middle">{{ $submission->user->fname }} {{ $submission->user->lname }}</td>
					<td class="align-middle">{{ $form1->email }}</td>
					<td class="align-middle">{{ $form1->type }}</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>
</div>

@else

<div class="card">

	<div class="card-header">
		<h4 class="card-title">List Forms</h4>

		<a href="{{ route('submission.form') }}" class="btn btn-primary btn-sm pull-right"><i class="material-icons md-18 align-middle">add</i> Add New</a>
	</div>

	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
					<th style="width: 120px;">Date</th>
					<th>Email</th>
					<th style="width: 100px;">Type</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($submissions as $submission)
				@php($form1=json_decode($submission->form1))
				<tr>
					<td class="align-middle">{{ date('j M Y',strtotime($submission->created_at)) }}</td>
					<td class="align-middle">{{ $form1->email }}</td>
					<td class="align-middle">{{ $form1->type }}</td>
					<td class="align-middle" style="width:40px">
						<a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons md-18 align-middle">more_vert</i>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{ route('submission.form') }}?id={{ base64_encode($submission->id)}}">
								<i class="material-icons md-14 align-middle">edit</i>
								<span class="align-middle">Edit</span>
							</a>

							<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" title="Delete" data-method="Delete" data-confirm="Are you sure?" href="{{ route('submission.destroy', $submission->id) }}">
								<i class="material-icons md-14 align-middle">delete</i>
								<span class="align-middle">Delete</span>
							</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endif

{{ $submissions->links() }}
@endsection