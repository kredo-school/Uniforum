@extends('layouts.app')

@section('login-register-content')
<div class="bg-light-purple vh-90">
    <div class="container w-50 vh-90">
        <div class="row justify-content-center vh-90 d-flex align-items-center">
            <div class="col-md-8 ">
                <div class="card my-auto login-card">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                    <div class="card-header bg-white border-0 py-4">
                        <div class="text-center">
                            <i class="fa-solid fa-circle-user display-2 text-secondary"></i>
                        </div>
                        <h2 class="text-center mt-3">Login</h2>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="">
                            {{-- action="{{ route('login') }}" --}}
                            @csrf

                            <div class="row mb-3 mt-4">
                                {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                                {{-- <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="text-center">
                                    <input id="email" type="email" class="login-input @error('email') is-invalid @enderror py-1 px-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="text-center">
                                    <input id="password" type="password" class="login-input @error('password') is-invalid @enderror py-1 px-2" name="password" required autocomplete="current-password" placeholder="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label mid-gray " for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="mb-0 text-center mt-5">
                                <button type="submit" class="login-btn py-1">
                                    {{ __('Login') }}
                                </button>

                                <div class="mt-2">
                                    <a href="{{route('register')}}" class="text-decoration-none dark-purple">
                                        <i class="fa-solid fa-arrow-right"></i> Create new account
                                    </a>
                                </div>
                                @if (Route::has('password.request'))
                                <div>
                                    <a class="btn btn-link sub-purple-gray" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-white border-0"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
