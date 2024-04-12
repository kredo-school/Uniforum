@extends('layouts.app')

@section('login-register-content')
<div class="bg-light-purple vh-90">
    <div class="container w-75 vh-90">
        <div class="row justify-content-center vh-90 d-flex align-items-center">
            <div class="col-md-8 ">
                <div class="card my-auto login-card">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                    <div class="card-header bg-white border-0 py-4">
                        <div class="text-center">
                            <i class="fa-solid fa-circle-user display-2 text-secondary"></i>
                        </div>
                        <h2 class="text-center mt-3">Register</h2>
                    </div>

                    <div class="card-body bg-white w-100">
                        <form method="POST" action="">
                            {{-- action="{{ route('register') }} --}}
                            @csrf

                            <div class="row mb-3 mt-2">

                                <div class="col text-end">
                                    <input id="username" type="text" class="register-input @error('username') is-invalid @enderror py-1 px-2" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="username">
                                    {{-- @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>

                                <div class="col">
                                    <input id="email" type="email" class="register-input @error('email') is-invalid @enderror py-1 px-2" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                    {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="text-center">
                                    <select class="uni-select px-1">
                                        <option selected>Choose Your university/college</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="text-center">
                                    <input id="password" type="password" class="register-input @error('password') is-invalid @enderror py-1 px-2" name="password" required autocomplete="current-password" placeholder="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="text-center">
                                    <input id="password-confirm" type="password" class="register-input py-1 px-2" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                                </div>
                            </div>



                            <div class="mb-0 text-center mt-5">
                                <button type="submit" class="register-btn py-1">
                                    {{ __('Register') }}
                                </button>

                                <div class="mt-2">
                                    <a href="{{route('login')}}" class="text-decoration-none dark-purple">
                                        <i class="fa-solid fa-arrow-right"></i> I have an account
                                    </a>
                                </div>
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


{{-- @extends('layouts.app')

@section('content')
<div class="bg-light-purple">
    <div class="container w-50">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-md-8">
                <div class="card login-card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
