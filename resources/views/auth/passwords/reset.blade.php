@extends('layouts.app')

@section('login-register-content')
<div class="bg-light-purple vh-90">
    <div class="container w-50 vh-90">
        <div class="row justify-content-center vh-90 d-flex align-items-center">
            <div class="col-md-8 ">
                <div class="card my-auto login-card">
                    <div class="card-header bg-white border-0 pt-5 pb-4">
                        <div class="text-center">
                            <img src="{{ asset('image/Group 9.png')}}" alt="" class="card-head-logo">
                        </div>
                        <h2 class="text-center mt-3">Reset Password</h2>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3 mt-3">
                                <div class="text-center">
                                    <input id="email" type="email" class="login-input @error('email') is-invalid @enderror py-1 px-2" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Enter your email">

                                    @error('email')
                                    <div class="w-70 mx-auto">
                                        <span class="uni-invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="text-center">
                                    <input id="password" type="password" class="login-input @error('password') is-invalid @enderror py-1 px-2" name="password" required autocomplete="new-password" placeholder="Enter new password" autofocus>
                                </div>
                            </div>

                            <div class="row mb-5">

                                <div class="text-center">
                                    <input id="password-confirm" type="password" class="login-input py-1 px-2" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                    @error('password')
                                    <div class="w-70 mx-auto">
                                        <span class="uni-invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0 w-70 mx-auto">
                                <button type="submit" class="login-btn py-1">
                                    {{ __('Reset Password') }}
                                </button>
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
