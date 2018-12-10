
@include('pages.analytic.view.filter')

<div class="card">
	<div class="card-header">
		<h4 class="card-title">{{ $title['title'] }}</h4>	
	</div>
	
	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
					<td rowspan="2">User Type</td>
					<td colspan="3"> keyuisition</td>
					<td colspan="3"> Behavior</td>
					<td colspan="3"> Conversions</td>
				</tr>
				<tr class="bg-fade">
					<td>Sessions</td>
					<td> % New Sessions</td>
					<td> New Users</td>
					<td>Bounce Rate</td>
					<td>Pages / Session</td>
					<td>Avg. Session Duration</td>
					<td>Page View (Goal 1 Conversion Rate)</td>
					<td>Page View (Goal 1 Completions)</td>
					<td>Page View (Goal 1 Value)</td>
				</tr>
			</thead>

			<tbody>
			@if(@$premium->reports)
				
				<tr>
					<td></td>
					<td><span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[0] ? $premium->reports[0]->data->totals[0]->values[0] : '' }}</span>
							<span class="td-sub-title"> % of Total: 100.00% ({{ $premium->reports[0]->data->totals[0]->values[0] ? $premium->reports[0]->data->totals[0]->values[0] : '' }}) </span>
					</td>

					<td><span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[1] ? round($premium->reports[0]->data->totals[0]->values[4],2) . '%' : '' }}</span>
							<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[1] ? round($premium->reports[0]->data->totals[0]->values[1],2) . '%' : '' }} (0.00%) </span>
					</td>

					<td><span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[2] ? $premium->reports[0]->data->totals[0]->values[2] : '' }}</span>
							<span class="td-sub-title"> % of Total: 100.00% ({{ $premium->reports[0]->data->totals[0]->values[2] ? $premium->reports[0]->data->totals[0]->values[2] : '' }}) </span>
					</td>

					<td><span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[3] ? round($premium->reports[0]->data->totals[0]->values[3],2) . '%' : '' }}</span>
							<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[3] ? round($premium->reports[0]->data->totals[0]->values[3],2) . '%' : '' }} (0.00%) </span>
					</td>

					<td><span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[4] ? round($premium->reports[0]->data->totals[0]->values[4],2) : '' }}</span>
							<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[4] ? round($premium->reports[0]->data->totals[0]->values[4],2) : '' }} (0.00%) </span>
					</td>

					<td><span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[5] ? gmdate('H:i:s', floor($premium->reports[0]->data->totals[0]->values[5])) : '' }}</span>
							<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[5] ? gmdate('H:i:s', floor($premium->reports[0]->data->totals[0]->values[5])) : '' }} (0.00%) </span>
					</td>

					<td><span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[6] ? round($premium->reports[0]->data->totals[0]->values[6],2) . '%' : '' }}</span>
							<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[6] ? round($premium->reports[0]->data->totals[0]->values[6],2) . '%' : '' }} (0.00%) </span>
					</td>

					<td><span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[7] ? $premium->reports[0]->data->totals[0]->values[7] : 0 }}</span>
							<span class="td-sub-title"> % of Total: 100.00% ({{ $premium->reports[0]->data->totals[0]->values[7] ? $premium->reports[0]->data->totals[0]->values[7] : '' }}) </span>
					</td>

					<td><span class="td-title"><i class="fa fa-usd" aria-hidden="true"></i>{{ $premium->reports[0]->data->totals[0]->values[8] ? $premium->reports[0]->data->totals[0]->values[8] : '' }}</span>
							<span class="td-sub-title"> % of Total: 100.00% (<i class="fa fa-usd" aria-hidden="true"></i>{{ $premium->reports[0]->data->totals[0]->values[8] ? $premium->reports[0]->data->totals[0]->values[8] : '' }}) </span>
					</td>
				</tr>
				
				
				@if(@$premium->reports[0]->data->rows)
				@foreach($premium->reports[0]->data->rows as $key)
				<tr>
					<td>{{ $key->dimensions[0] ? $key->dimensions[0] : '' }}</td>
					<td><?= @($key->metrics[0]->values) ? $key->metrics[0]->values[0] . '<span class="persantage">(' . round($key->metrics[0]->values[0] / $premium->reports[0]->data->totals[0]->values[0] * 100,2) . '%)</span>' : ''; ?></td>
					<td>{{ @($key->metrics[0]->values) ? round($key->metrics[0]->values[1],2) . '%' : '' }}</td>
					<td><?= @($key->metrics[0]->values) ? $key->metrics[0]->values[2] . '<span class="persantage">(' . round($key->metrics[0]->values[2] / $premium->reports[0]->data->totals[0]->values[2] * 100,2) . '%)</span>' : ''; ?></td>
					<td>{{ @($key->metrics[0]->values) ? round($key->metrics[0]->values[3],2) . '%' : '' }}</td>
					<td>{{ @($key->metrics[0]->values) ? round($key->metrics[0]->values[4],2) : '' }}</td>
					<td>{{ @($key->metrics[0]->values) ? gmdate('H:i:s', floor($key->metrics[0]->values[5])) : '' }}</td>
					<td>{{ @($key->metrics[0]->values) ? round($key->metrics[0]->values[6],2) . '%' : '' }}</td>
					<td><?= @($key->metrics[0]->values) ? $key->metrics[0]->values[7] . '<span class="persantage">(' . round($key->metrics[0]->values[7] / (($premium->reports[0]->data->totals[0]->values[7] != 0) ? $premium->reports[0]->data->totals[0]->values[7] : 1) * 100, 2) . '%)</span>' : ''; ?></td>
					<td><i class="la la-usd" aria-hidden="true"></i>{{ @($key->metrics[0]->values) ? $key->metrics[0]->values[8] : '' }}</td>
				</tr>
				@endforeach
				@endif
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