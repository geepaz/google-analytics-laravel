{!! Form::open(['route' => ['profile.password']]) !!}

	<div class="form-group {!! ($errors->has('current_password') ? 'has-error' : '') !!}">
		{!! Form::label('current_password','Current Password', ['class' => 'control-label']) !!}
		<input type="password" name="current_password" class="form-control {!! ($errors->has('current_password') ? 'has-error' : '') !!}">
		{!! $errors->first('current_password', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('new_password') ? 'has-error' : '') !!}">
		{!! Form::label('new_password','New Password', ['class' => 'control-label']) !!}
		<input type="password" name="new_password" class="form-control {!! ($errors->has('new_password') ? 'has-error' : '') !!}">
		{!! $errors->first('new_password', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {!! ($errors->has('new_password_confirmed') ? 'has-error' : '') !!}">
		{!! Form::label('new_password_confirmed','Confirm Password', ['class' => 'control-label']) !!}
		<input type="password" name="new_password_confirmed" class="form-control {!! ($errors->has('new_password_confirmed') ? 'has-error' : '') !!}">
		{!! $errors->first('new_password_confirmed', '<span class="help-block">:message</span>') !!}
	</div>

	<button class="btn btn-success">Change Password</button>

{!! Form::close() !!}