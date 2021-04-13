@extends('layout.enter')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-8 mx-auto">
            <h3 class="login-heading mb-4">Register</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-label-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="name">{{ __('Full Name') }}</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-label-group">
                  <input type="date" name="birth_date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" placeholder="Date of Birth" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>
                  <label for="birth_date">Date of Birth</label>
                  @error('birth_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-label-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <label for="email">{{ __('Email Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-label-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                    <label for="password">{{ __('Password') }}</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-label-group">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                </div>

                <button type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2">
                    {{ __('Register') }}
                </button>

                <div class="text-center">
                    <a class="small" href={{ route('login') }}>Already Have An Account? Login</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
