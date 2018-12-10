
@include('pages.analytic.view.filter')

<div class="card">
	
	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
					<td rowspan="2">Landing Page</td>
					<td colspan="3"> Acquisition</td>
				</tr>
				<tr class="bg-fade">
					<td>Sessions</td>
					<td> % New Sessions</td>
					<td> New Users</td>
				</tr>
			</thead>

			<tbody>
			@if(@$_GET['search'] && @$premium->reports[0]->data->rows)
				
				<tr>
					<td></td>
					<td>
						<span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[0] ? $premium->reports[0]->data->totals[0]->values[0] : '' }}</span>
						<span class="td-sub-title"> % of Total: 100.00% ({{ $premium->reports[0]->data->totals[0]->values[0] ? $premium->reports[0]->data->totals[0]->values[0] : '' }}) </span>
					</td>

					<td>
						<span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[1] ? round($premium->reports[0]->data->totals[0]->values[4],2) . '%' : '' }}</span>
						<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[1] ? round($premium->reports[0]->data->totals[0]->values[1],2) . '%' : '' }} (0.00%) </span>
					</td>
					<td>
						<span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[2] ? $premium->reports[0]->data->totals[0]->values[2] : '' }}</span>
						<span class="td-sub-title"> % of Total: 100.00% ({{ $premium->reports[0]->data->totals[0]->values[2] ? $premium->reports[0]->data->totals[0]->values[2] : '' }}) </span>
					</td>
				</tr>
				
				@foreach($premium->reports[0]->data->rows as $key)
				<tr>
					<td title="{{ @($key->dimensions[0]) ? $key->dimensions[0] : '' }}">{{ text_limit($key->dimensions[0] ? $key->dimensions[0] : '',25) }}</td>
					<td><?= @($key->metrics[0]->values) ? $key->metrics[0]->values[0] . '<span class="persantage">(' . round($key->metrics[0]->values[0] / $premium->reports[0]->data->totals[0]->values[0] * 100,2) . '%)</span>' : ''; ?></td>
					<td>{{ @($key->metrics[0]->values) ? round($key->metrics[0]->values[1],2) . '%' : '' }}</td>
					<td><?= @($key->metrics[0]->values[2]) ? $key->metrics[0]->values[2] . '<span class="persantage">(' . round($key->metrics[0]->values[2] / $premium->reports[0]->data->totals[0]->values[2] * 100,2) . '%)</span>' : ''; ?></td>

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



<div class="card">	
	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
					<td rowspan="2">Landing Page</td>
					<td colspan="3"> Behavior</td>
				</tr>
				<tr class="bg-fade">
					<td>Bounce Rate</td>
					<td>Pages / Session</td>
					<td>Avg. Session Duration</td>
				</tr>
			</thead>

			<tbody>
			@if(@$_GET['search'] && @$premium->reports[0]->data->rows)
				
				<tr>
					<td></td>
					<td>
						<span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[3] ? round_figure($premium->reports[0]->data->totals[0]->values[3]) . '%' : '' }}</span>
						<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[3] ? round_figure($premium->reports[0]->data->totals[0]->values[3]) . '%' : '' }} (0.00%) </span>
					</td>

					<td>
						<span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[4] ? round_figure($premium->reports[0]->data->totals[0]->values[4]) : '' }}</span>
						<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[4] ? round_figure($premium->reports[0]->data->totals[0]->values[4]) : '' }} (0.00%) </span>
					</td>

					<td>
						<span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[5] ? gmdate('H:i:s', floor($premium->reports[0]->data->totals[0]->values[5])) : '' }}</span>
						<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[5] ? gmdate('H:i:s', floor($premium->reports[0]->data->totals[0]->values[5])) : '' }} (0.00%) </span>
					</td>
				</tr>
				
				@foreach($premium->reports[0]->data->rows as $key)
				<tr>
					<td title="{{ $key->dimensions[0] ? $key->dimensions[0] : '' }}">{{ text_limit($key->dimensions[0] ? $key->dimensions[0] : '',25) }}</td>
					<td>{{ $key->metrics[0]->values ? round_figure($key->metrics[0]->values[3]) . '%' : '' }}</td>
					<td>{{ $key->metrics[0]->values ? round_figure($key->metrics[0]->values[4]) : '' }}</td>
					<td>{{ $key->metrics[0]->values ? gmdate('H:i:s', floor($key->metrics[0]->values[5])) : '' }}</td>
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




<div class="card">	
	<div class="table-responsive">
		<table class="table m-0">
			<thead>
				<tr class="bg-fade">
					<td rowspan="2">Landing Page</td>
					<td colspan="3">Conversions</td>
				</tr>
				<tr class="bg-fade">
					<td>Page View (Goal 1 Conversion Rate)</td>
					<td>Page View (Goal 1 Completions)</td>
					<td>Page View (Goal 1 Value)</td>
				</tr>
			</thead>

			<tbody>
			@if(@$_GET['search'] && @$premium->reports[0]->data->rows)
				
				<tr>
					<td></td>
					<td>
						<span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[6] ? round_figure($premium->reports[0]->data->totals[0]->values[6]) . '%' : '' }}</span>
						<span class="td-sub-title"> Avg for View: {{ $premium->reports[0]->data->totals[0]->values[6] ? round_figure($premium->reports[0]->data->totals[0]->values[6]) . '%' : '' }} (0.00%) </span>
					</td>

					<td>
						<span class="td-title">{{ $premium->reports[0]->data->totals[0]->values[7] ? $premium->reports[0]->data->totals[0]->values[7] : 0 }}</span>
						<span class="td-sub-title"> % of Total: 100.00% ({{ $premium->reports[0]->data->totals[0]->values[7] ? $premium->reports[0]->data->totals[0]->values[7] : 0 }}) </span>
					</td>

					<td>
						<span class="td-title"><i class="fa fa-usd" aria-hidden="true"></i>{{ $premium->reports[0]->data->totals[0]->values[8] ? $premium->reports[0]->data->totals[0]->values[8] : '' }}</span>
						<span class="td-sub-title"> % of Total: 100.00% (<i class="fa fa-usd" aria-hidden="true"></i>{{ $premium->reports[0]->data->totals[0]->values[8] ? $premium->reports[0]->data->totals[0]->values[8] : '' }}) </span>
					</td>
				</tr>
				
				@foreach($premium->reports[0]->data->rows as $key)
				<tr>
					<td title="{{ $key->dimensions[0] ? $key->dimensions[0] : '' }}">{{ text_limit($key->dimensions[0] ? $key->dimensions[0] : '',25) }}</td>
					<td>{{ $key->metrics[0]->values ? round_figure($key->metrics[0]->values[6]) . '%' : '' }}</td>
					<td><?= $key->metrics[0]->values ? $key->metrics[0]->values[7] . '<span class="persantage">(' . round_figure($key->metrics[0]->values[7] / (($premium->reports[0]->data->totals[0]->values[7] != 0) ? $premium->reports[0]->data->totals[0]->values[7] : 1) * 100) . '%)</span>' : ''; ?></td>
					<td><i class="fa fa-usd" aria-hidden="true"></i>{{ $key->metrics[0]->values ? $key->metrics[0]->values[8] : '' }}</td>
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