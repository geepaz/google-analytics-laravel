<h3 class="back-color">Premium - Other Submission</h3>

@php($data=json_decode($submission->form4))
{!! Form::model($data, ['route' => ['submission.form4', $submission->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}

	<div class="form-group {!! ($errors->has('title') ? 'has-error' : '') !!}">
		<p>Content included in the "Other Submission" category includes 50-State Surveys and Analytics products.</p>
		{!! Form::label('title','Title of Content', ['class' => 'control-label']) !!}
		<p>This is the title that will be displayed on the Insights@ManattHealth web portal, as well as the title used in the automated email notification that is sent to portal subscribers to alert them to the availability of new content.</p>
		{!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('date') ? 'has-error' : '') !!}">
		{!! Form::label('date','Publication Date', ['class' => 'control-label']) !!}
		{!! Form::date('date', null, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('date', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('key_topic') ? 'has-error' : '') !!}">
		{!! Form::label('key_topic','Key Topics', ['class' => 'control-label']) !!}
		<p>Your content will be tagged with any "key topics" that are marked below, and will be indexed for search on the Insights@ManattHealth web portal in accordance with selected key topics.</p>
		
		@php($topics=array('1'=>'Digital Health', '2'=>'Fraud and Abuse', '3'=>'Insurance and Marketplace', '4'=>'Life Sciences', '5'=>'Litigation', '6'=>'Medicaid', '7'=>'Medicare', '8'=>'Payment and Delivery Transformation', '9'=>'Privacy and Security', '10'=>'Anti-Trust'))
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col" class="text-center"></th>
						<th scope="col" class="text-center">Key Topics</th>
					</tr>
				</thead>
				<tbody>
					@php($json_topic=json_decode(@$data->key_topic))
					@foreach($topics as $k => $topic)
					<tr>
						<td class="align-middle" scope="row">{{ $topic }}</td>
						<td class="align-middle text-center">
							<input type="checkbox" name="key_topic[]" value="{{ $k }}" {{ @(in_array($k, $json_topic) ? 'checked': '') }}>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{!! $errors->first('key_topic', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('states') ? 'has-error' : '') !!}">
		{!! Form::label('states','Featured States', ['class' => 'control-label']) !!}
		<p>List any states that are featured in the document. Content will be tagged with featured states and indexed for search on the Insights@ManattHealth web portal under the state(s) name.</p>
		{!! Form::text('states', null, ['class' => 'form-control' . ($errors->has('states') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('states', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('image') ? 'has-error' : '') !!}">
		{!! Form::label('image','Image', ['class' => 'control-label']) !!}
		<p>Select a corresponding image for the content. The image will be displayed on the relevant Premium Content landing page on the Insights@ManattHealth web portal. You may search for images using the Image Bank: <a href="http://35.196.93.240/insights-image-bank" target="_blank">http://35.196.93.240/insights-image-bank</a></p>
		{!! Form::file('image', null, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '') ]) !!}

		@if(@$data->image)
		<img style="width:200px;" class="form-control" src="{{ asset('upload/submission/image/'.$data->image) }}">
		@endif

		{!! $errors->first('image', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('summery') ? 'has-error' : '') !!}">
		{!! Form::label('summery','Paragraph Summary', ['class' => 'control-label']) !!}
		<p>Paragraph should provide a short summary and key highlights from the document or cointent that you are submitting. The paragraph will be displayed on the portal webpage where the document or other content is available for download.</p>
		{!! Form::text('summery', null, ['class' => 'form-control' . ($errors->has('summery') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('summery', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('description') ? 'has-error' : '') !!}">
		{!! Form::label('description','Content Description for Email Notification', ['class' => 'control-label']) !!}
		<p>The Notification should be a brief (300 character) description of the content for inclusion in the automated email notification that is sent to portal subscribers to alert them to the availability of new content. Can be a shortened version of the paragraph summary provided above.</p>
		{!! Form::text('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('pdf') ? 'has-error' : '') !!}">
		{!! Form::label('pdf','Final PDF(s)', ['class' => 'control-label']) !!}
		<p>If you do not have a shareable link for download, please Respond All to the automated form email with the PDF attached. Thanks!</p>
		{!! Form::file('pdf', null, ['class' => 'form-control' . ($errors->has('pdf') ? ' is-invalid' : '') ]) !!}

		@if(@$data->pdf)
		<a class="form-control" target="_blank" href="{{ asset('upload/submission/pdf/'.$data->pdf) }}">{{ $data->pdf }}</a>
		@endif

		{!! $errors->first('pdf', '<span class="help-block">:message</span>') !!}
	</div>

	<a href="{{ url('submission/form?id='.base64_encode($submission->id).'&page=premium') }}" class="btn btn-default">Back</a>
	<button class="btn btn-primary">Submit</button>
{!! Form::close() !!}