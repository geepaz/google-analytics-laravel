@extends('layouts.app')
@section('content')

	
	@if($page=='keywords')
		@include('pages.analytic.view.keywords')
	@elseif($page=='visitors')
		@include('pages.analytic.view.visitors')
	@elseif($page=='premium')
		@include('pages.analytic.view.premium')
	@elseif($page=='landing')
		@include('pages.analytic.view.landing')
	@endif


@endsection


@section('script')

<link type="text/css" href="{{ asset('assets/css/vendor-bootstrap-datepicker.css') }}" rel="stylesheet">
<script src="{{ asset('assets/vendor/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/datepicker.js') }}"></script>

<script>
	var form = jQuery('#filterForm');
	@if(!@$_GET['search'])
		search();
	@endif
		
	function filterPagi(page){
		form.append("<input type='hidden' name='page' value='" + page + "' />");
		search();
	}
	function search(){
		form.get(0).submit();
	}
</script>


@if($page=='premium')
	@include('pages.analytic.graphsjs')
	<script>
		jQuery('a.filter').on('click', function(){
			var filter = jQuery(this).html();
			form.append("<input type='hidden' name='filter' value='" + filter + "' />");
			search();
		});
		function back(){
			jQuery('input[name=filter]').remove();
			search();
		}
	</script>
@endif

@endsection