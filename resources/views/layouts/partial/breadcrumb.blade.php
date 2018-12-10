<ol class="breadcrumb p-0">
	@if(empty(Request::segment(1)) || Request::segment(1)=='dashboard')
		<li class="text-muted">Welcome to Dashboard</li>
	@else
		<li><a href="{{route('dashboard.index')}}">Dashboard</a></li>			
		@for($i=1; $i <= count(Request::segments()); $i++)
			@if(count(Request::segments())==$i || $i>1)
			<li class="text-muted">{{ ucfirst(Request::segment($i)) }}</li>
			@else
			<li><a href="{{url('/'.Request::segment($i))}}">{{ ucfirst(Request::segment($i)) }}</a></li>
			@endif
		@endfor
	@endif
</ol>