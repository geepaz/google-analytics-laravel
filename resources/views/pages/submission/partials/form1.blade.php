
@if(@$submission)
@php($data=json_decode($submission->form1))
{!! Form::model($data, ['route' => ['submission.form1edit', $submission->id], 'method' => 'PATCH']) !!}
@else
{!! Form::open(['route' => 'submission.form1']) !!}
@endif
	<div class="form-group">
		<p>This form is intended to capture relevant information regarding content that you are submitting for public distribution on Manatt.com  ("Public Content"), or for limited distribution to Insights@ManattHealth subscribers via our online portal ("Premium Content"). </p>
		<p>If your content is under development, you will have the opportunity to update the information you provide upon finalization. Once in final form, information provided on the Content Submission Form will be uploaded to Manatt.com or the Insights@ManattHealth portal as drafted herein. Accordingly, please ensure that information is accurate, complete, and suitable for distribution to the public or to portal subscribers.</p>
		<p>If you have questions about any of the fields in the form, please reach out to Alex Welcing at <a href="mailto:awelcing@manatt.com">awelcing@manatt.com</a>.</p>
	</div>

	<div class="form-group {!! ($errors->has('email') ? 'has-error' : '') !!}">
		{!! Form::label('email','Email address', ['class' => 'control-label']) !!}
		{!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required'=>'required' ]) !!}
		{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('type') ? 'has-error' : '') !!}">
		{!! Form::label('type','What are you trying to do today?', ['class' => 'control-label']) !!}</br>
		{!! Form::radio('type', 'public') !!} New Public Content submission</br>
		{!! Form::radio('type', 'premium') !!} New Premium Content submission</br>
		{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
	</div>

	<button class="btn btn-default">Next</button>
{!! Form::close() !!}