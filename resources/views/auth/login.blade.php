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
                        <h2 class="text-center mt-3">Login</h2>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('login-user') }}">
                            @csrf
                            @method('POST')
                            <div class="row mb-3 mt-4">
                                <div class="text-center">
                                    <input id="email" type="email" class="login-input @error('email') is-invalid @enderror py-1 px-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="text-center">
                                    <input id="password" type="password" class="login-input @error('password') is-invalid @enderror py-1 px-2" name="password" required autocomplete="current-password" placeholder="password">
                                </div>
                                <div class="">
                                    @error('email')
                                        <div class="w-70 mx-auto uni-invalid-feedback p-1" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    @error('password')
                                        <div class="w-70 mx-auto uni-invalid-feedback p-1" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-0 text-center mt-5">
                                <button type="submit" class="login-btn py-1">
                                    {{ __('Login') }}
                                </button>

                                <div class="mt-2">
                                    <a href="{{route('register')}}" class="text-decoration-none dark-purple">
                                        <i class="fa-solid fa-arrow-right"></i> Create new account
                                    </a>
                                </div>
                                {{-- @if (Route::has('password.request'))
                                <div>
                                    <a class="btn btn-link sub-purple-gray" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                @endif --}}
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
