<div class="card filter">
	<div class="col-md-12 col-lg-12">
		<form id="filterForm" method="get" class="form-inline float-right m-2">
			<input type="hidden" name="search" value="filter">
			
			<div class="form-group mr-2">
				<label class="control-label mr-1">Per Page:</label>
				<select class="form-control" name="per_page">
					<option {{ ($parms['per_page']=='10') ? 'selected' : '' }}>10</option>
					<option {{ ($parms['per_page']=='20') ? 'selected' : '' }}>20</option>
					<option {{ ($parms['per_page']=='50') ? 'selected' : '' }}>50</option>
					<option {{ ($parms['per_page']=='100') ? 'selected' : '' }}>100</option>
				</select>
			</div>
			
			<div class="form-group mr-2">
				<label class="control-label mr-1">From:</label>
				<input type="text" class="datepicker form-control" name="from_date" value="{{ $parms['from_date'] }}">
			</div>
			
			<div class="form-group mr-2">
				<label class="control-label mr-1">To: </label>
				<input type="text" class="datepicker form-control" name="to_date" value="{{ $parms['to_date'] }}">
			</div>
			
			@if(@$parms['filter'])
				<input type="hidden" name="filter" value="{{ $parms['filter'] }}">
			@endif
			
			<div class="form-group">
				<button onclick="search()" class="btn btn-success">Search</button>
			</div>
		</form>
	</div>
</div>