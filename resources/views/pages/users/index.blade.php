@extends('layouts.app')
@section('content')
<div class="card">

	<div class="card-header">
		<h4 class="card-title">List Users</h4>

		<a href="{{ route('users.create') }}" class="btn btn-primary btn-sm pull-right"><i class="material-icons md-18 align-middle">add</i> Add New</a>
	</div>

	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
					<th style="width: 120px;">Date</th>
					<th>Name</th>
					<th>Email</th>
					<th style="width: 100px;">Role</th>
					<th style="width: 140px;">Status</th>
					<th style="width: 100px">Block</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				@foreach($users as $user)
				<tr>
					<td class="align-middle">{{ date('j M Y',strtotime($user->created_at)) }}</td>
					<td class="align-middle">{{ $user->fname }} {{ $user->lname }}</td>
					<td class="align-middle">{{ $user->email }}</td>
					<td class="align-middle"><b>{{ ucfirst($user->role) }}</b></td>
					<td class="align-middle">
						@if($user->active=='1')
						<div class="badge badge-success">Active</div>
						@else
						<div class="badge badge-warning">In-active</div>
						@endif
					</td>
					<td class="align-middle">						
						@if($user->blocked=='1')
						<div class="badge badge-danger">Yes</div>
						@else
						<div class="badge badge-success">No</div>
						@endif
					</td>
					<td class="align-middle" style="width:40px">
						<a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons md-18 align-middle">more_vert</i>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
								<i class="material-icons md-14 align-middle">edit</i>
								<span class="align-middle">Edit</span>
							</a>

							<a class="dropdown-item" href="{{ route('users.block', $user->id) }}">
								<i class="material-icons md-18 align-middle text-danger">block</i>
								<span class="align-middle">{{ ($user->blocked=='0')? 'Block':'Un-block' }} user</span>
							</a>

							<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" title="Delete" data-method="Delete" data-confirm="Are you sure?" href="{{ route('users.destroy', $user->id) }}">
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
	{{ $users->links() }}
</div>
@endsection