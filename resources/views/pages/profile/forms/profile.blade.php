{!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
	<div class="form-row">
		<div class="form-group col-lg-6 {!! ($errors->has('fname') ? 'has-error' : '') !!}">
			{!! Form::label('fname','First Name', ['class' => 'control-label']) !!}
			{!! Form::text('fname', null, ['class' => 'form-control' . ($errors->has('fname') ? ' is-invalid' : '') ]) !!}
			{!! $errors->first('fname', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group col-lg-6 {!! ($errors->has('lname') ? 'has-error' : '') !!}">
			{!! Form::label('lname','Last Name', ['class' => 'control-label']) !!}
			{!! Form::text('lname', null, ['class' => 'form-control' . ($errors->has('lname') ? ' is-invalid' : '') ]) !!}
			{!! $errors->first('lname', '<span class="help-block">:message</span>') !!}
		</div>
	</div>

	<div class="form-group {!! ($errors->has('image') ? 'has-error' : '') !!}">
		{!! Form::label('image','Image', ['class' => 'control-label']) !!}</br>
		{!! Form::file('image', null, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '') ]) !!}
		{!! $errors->first('image', '<span class="help-block">:message</span>') !!}
	</div>

	<button class="btn btn-success">Save changes</button>
{!! Form::close() !!}