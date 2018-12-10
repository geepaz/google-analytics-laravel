<h3 class="back-color">Public Content</h3>
@php($data=json_decode($submission->form2))
{!! Form::model($data, ['route' => ['submission.form2', $submission->id], 'method' => 'PATCH']) !!}
	

	<div class="form-group">
		<p>If your content is under development, please do your best to answer the questions below. You will have the opportunity to update this information once content is final.</p>
	</div>

	<div class="form-group {!! ($errors->has('content') ? 'has-error' : '') !!}">
		{!! Form::label('content','Title of Content', ['class' => 'control-label']) !!}
		<p>This title will be used on Manatt.com and on the Insights@ManattHealth web portal. The title also will be used in the automated email notification that is sent to portal subscribers to alert them to the availability of new content.</p>
		{!! Form::text('content', null, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('content', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('type') ? 'has-error' : '') !!}">
		{!! Form::label('type','Content Type', ['class' => 'control-label']) !!}</br>
		{!! Form::radio('type', '1') !!} Public Article</br>
		{!! Form::radio('type', '2') !!} Public Newsletter</br>
		{!! Form::radio('type', '3') !!} Public Webinar</br>
		{!! Form::radio('type', '4') !!} Public White Paper</br>
		{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('author') ? 'has-error' : '') !!}">
		{!! Form::label('author','Authors/Presenters', ['class' => 'control-label']) !!}</br>
		{!! Form::text('author', null, ['class' => 'form-control' . ($errors->has('author') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('author', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('date') ? 'has-error' : '') !!}">
		{!! Form::label('date','Publication Date', ['class' => 'control-label']) !!}</br>
		{!! Form::date('date', null, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('date', '<span class="help-block">:message</span>') !!}
	</div>

	<a href="{{ url('submission/form?id='.base64_encode($submission->id)) }}" class="btn btn-default">Back</a>
	<button class="btn btn-default">Next</button>
{!! Form::close() !!}