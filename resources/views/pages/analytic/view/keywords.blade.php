
@include('pages.analytic.view.filter')

<div class="card">
	<div class="card-header">
		<h4 class="card-title">{{ $title['title'] }}</h4>	
	</div>

	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
						<th>Page Title</th>
						<th>Keyword</th>
						<th>User</th>
				</tr>
			</thead>
			
			<tbody>
			@if(@$premium->reports[0]->data->rows)
				@foreach($premium->reports[0]->data->rows as $key)
				<tr>
					<td title="{{ $key->dimensions[0] ? $key->dimensions[0] : '' }}"> {{ text_limit($key->dimensions[0] ? $key->dimensions[0] : '',25) }}</td>
					<td>{{ ($key->dimensions[0]) ? $key->dimensions[1] : '' }}</td>
					<td><?= $key->metrics[0] ? $key->metrics[0]->values[1] . '<span class="persantage">(' . round($key->metrics[0]->values[5], 2) . '%)</span>' : ''; ?></td>
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
			</tbody>
		</table>
	</div>
</div>


@if(@$premium->reports[0]->data->rows)
<div class="row">
	<div class="col-md-12">
		<ul class="pagination float-right mb-2">
			
			<li class="page-item active">
				<span class="page-link">{{ $parms['page'] }}</span>
			</li>
			
			@if(@$premium->reports[0]->nextPageToken>$parms['page'])
			<li class="page-item">
				<a class="page-link" href="javascript:void(0)" title="Next" onclick="filterPagi({{ @$premium->reports[0]->nextPageToken }})">
					<span aria-hidden="true">»</span>
					<span class="sr-only">Next</span>
				</a>
			</li>
			@endif
			
		</ul>
	</div>
</div>
@endif