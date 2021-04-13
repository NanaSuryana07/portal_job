@extends('layout.enter')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-8 mx-auto">
            <h3 class="login-heading mb-4">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-label-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="email">{{ __('Email Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-label-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                    <label for="password">{{ __('Password') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                       
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif

                <div class="text-center">
                    <a class="small" href={{ route('register') }}>Create An Account</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
