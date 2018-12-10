
@include('pages.analytic.view.filter')

<div class="card">
	<div class="card-header">
		<h4 class="card-title">{{ $title['title'] }}</h4>		
		@if(@$parms['filter'])
		<a href="javascript:void(0)" onclick="back()" class="btn btn-warning btn-sm pull-right"><i class="material-icons md-18 align-middle">chevron_left</i> Back</a>
		@endif
	</div>
	
	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
					<td>Premium Insights</td>
					<td>Pageviews</td>
					<td>Unique Views</td>
					<td>Avg. Time on Page</td>
					<td>%Exit</td>
				</tr>
			</thead>
			
			<tbody>
			@if(@$premium->reports[0]->data->rows)
				@foreach($premium->reports[0]->data->rows as $key)
				<tr>
					<td title="{{ $key->dimensions[0] ? $key->dimensions[0] : '' }}">
						@if(@$parms['filter'])
						{{ text_limit($key->dimensions[0] ? $key->dimensions[0] : '',25) }}
						@else
						<a href="javascript:void(0)" class="filter">{{ text_limit($key->dimensions[0] ? $key->dimensions[0] : '',25) }}</a>
						@endif
					</td>
					<td>{{ ($key->metrics[0]->values) ? round($key->metrics[0]->values[0], 2) : '' }}</td>
					<td>{{ ($key->metrics[0]->values) ? round($key->metrics[0]->values[1], 2) : '' }}</td>
					<td>{{ ($key->metrics[0]->values) ? round($key->metrics[0]->values[2], 2) : '' }}</td>
					<td>{{ ($key->metrics[0]->values) ? round($key->metrics[0]->values[3], 2) : '' }}</td>
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

@if(@$premium->reports[0]->data->rows && !@$parms['filter'])
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between">
				<h4 class="card-title">Premium Insights</h4>
			</div>
			<div class="card-body">
				<div class="graph" id="graph5"></div>
			</div>
		</div>
	</div>	
</div>
@endif