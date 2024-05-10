@php
use App\Models\University;

$all_uni = University::get();

@endphp

@extends('layouts.app')

@section('login-register-content')
<div class="bg-light-purple vh-90">
    <div class="container w-75 vh-90">
        <div class="row justify-content-center vh-90 d-flex align-items-center">
            <div class="col-md-8 ">
                <div class="card my-auto login-card">
                    <div class="card-header bg-white border-0 pt-5 pb-4">
                        <div class="text-center">
                            <img src="{{ asset('image/Group 9.png')}}" alt="" class="card-head-logo">
                        </div>
                        <h2 class="text-center mt-3">Register</h2>
                    </div>

                    <div class="card-body bg-white w-100">
                        <form method="POST" action="{{ route('register-user') }}">
                            @csrf
                            @method('POST')
                            <div class="row mb-3 mt-2">

                                <div class="col text-end">
                                    <input id="username" type="text" class="register-input @error('username') is-invalid @enderror py-1 px-2" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <input id="email" type="email" class="register-input @error('email') is-invalid @enderror py-1 px-2" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="text-center">
                                    <select class="uni-select px-1" name="uni_id">
                                        <option selected disabled>Choose Your university/college</option>
                                        @foreach ($all_uni as $university)
                                            <option value="{{$university->id}}">{{$university->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('uni_id')
                                        <div class="w-80 mx-auto text-start uni-invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="text-center">
                                    <input id="password" type="password" class="register-input @error('password') is-invalid @enderror py-1 px-2" name="password" required autocomplete="current-password" placeholder="password">

                                    @error('password')
                                        <div class="w-80 mx-auto text-start invalid-feedback password-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
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
