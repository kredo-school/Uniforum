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
                        @if (session('status'))
                        <div class="alert alert-success w-70 mx-auto" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-5 mt-3">
                                <div class="text-center">
                                    <input id="email" type="email" class="login-input @error('email') is-invalid @enderror py-1 px-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0 w-70 mx-auto">
                                <button type="submit" class="login-btn py-1">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>

                            <div class="mt-2 text-center">
                                <a href="{{route('login')}}" class="text-decoration-none dark-purple">
                                    <i class="fa-solid fa-chevron-left"></i> Back to login
                                </a>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer bg-white border-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
