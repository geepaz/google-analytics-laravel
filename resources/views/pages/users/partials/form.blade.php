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

<div class="form-group {!! ($errors->has('email') ? 'has-error' : '') !!}">
	{!! Form::label('email','Email', ['class' => 'control-label']) !!}
	{!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '') ]) !!}
	{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('role') ? 'has-error' : '') !!}">
	{!! Form::label('role','User Role', ['class' => 'control-label']) !!}
	{!! Form::select('role', [''=>'', 'user'=>'User', 'admin'=>'Admin'], null, ['class' => 'form-control' . ($errors->has('role') ? ' is-invalid' : '') ]) !!}
	{!! $errors->first('role', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('password') ? 'has-error' : '') !!}">
	{!! Form::label('password','Password', ['class' => 'control-label']) !!}
	<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
	{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
	{!! Form::label('password-confirm','Confirm Password', ['class' => 'control-label']) !!}
	<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
</div>