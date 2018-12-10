@extends('layouts.auth')

@section('content')
<div class="row w-100 justify-content-center">
    <div class="card card-login mb-3">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label>{{ __('E-Mail Address') }}</label>

                    <div class="input-group input-group--inline">
                        <div class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('Password') }}</label>
                    <div class="input-group input-group--inline">
                        <div class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group input-group--inline">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </div>


                <div class="d-flex">
                    <span class=""><a href="{{ route('password.request') }}">{{ __('Forgot Password') }}?</a></span>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
