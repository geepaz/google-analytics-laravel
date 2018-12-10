<h3 class="back-color">Premium Content Type</h3>

@php($data=json_decode($submission->form3))
{!! Form::model($data, ['route' => ['submission.form3', $submission->id], 'method' => 'PATCH']) !!}

	<div class="form-group {!! ($errors->has('type_txt') ? 'has-error' : '') !!}">
		{!! Form::label('type','What Content Type', ['class' => 'control-label']) !!}</br>
		{!! Form::radio('type', '1') !!} Manatt Insights</br>
		{!! Form::radio('type', '2') !!} Regulatory and Guidance Summary</br>
		{!! Form::radio('type', '3') !!} Analytics</br>
		{!! Form::radio('type', '3') !!} 50 State Survey</br>	
		{!! Form::radio('type', '4') !!} Other:
		{!! Form::text('type_txt', null, ['class' => 'form-control' . ($errors->has('type_txt') ? ' is-invalid' : '') ]) !!}

		{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
	</div>

	@php($form1=json_decode($submission->form1))
	@if($form1->type=='public')
	<a href="{{ url('submission/form?id='.base64_encode($submission->id).'&page=public') }}" class="btn btn-default">Back</a>
	@else
	<a href="{{ url('submission/form?id='.base64_encode($submission->id)) }}" class="btn btn-default">Back</a>
	@endif
	<button class="btn btn-default">Next</button>
{!! Form::close() !!}