@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    @include('user.team.component.view.head')
    <div class="mt-5 w-85 mx-auto">
        <div class="row">
            <div class="col text-center">
                <a href="{{route('team.view')}}" class="text-decoration-none dark-purple fs-5">
                    questions
                </a>
                {{-- <hr class="menu-hr mt-2"> --}}
            </div>
            <div class="col text-center">
                <a href="{{route('team.view.member')}}" class="text-decoration-none dark-purple fs-5">
                    members
                </a>
                <hr class="menu-hr mt-2">
            </div>
        </div>
        <div class="mt-3">
            <a href="{{route('profile')}}" class="text-decoration-none">
                <div class="row mb-4">
                    <div class="col-1 text-center">
                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                    </div>
                    <div class="col ms-auto d-flex align-items-center">
                        <p class="fs-5 m-0 thick-gray">Kredo Taro</p>
                    </div>
                    <div class="col text-end">
                        <p class="fs-5 dark-purple">Owner</p>
                    </div>
                </div>
            </a>
            <a href="{{route('profile')}}" class="text-decoration-none">
                <div class="row mb-4">
                    <div class="col-1 text-center">
                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                    </div>
                    <div class="col ms-auto d-flex align-items-center">
                        <p class="fs-5 m-0 thick-gray">Ike</p>
                    </div>
                    <div class="col text-end">
                        <p class="fs-5 dark-purple">Admin</p>
                    </div>
                </div>
            </a>

            <a href="{{route('profile')}}" class="text-decoration-none">
                <div class="row mb-4">
                    <div class="col-1 text-center">
                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                    </div>
                    <div class="col ms-auto d-flex align-items-center">
                        <p class="fs-5 m-0 thick-gray">Stanly</p>
                    </div>
                    <div class="col text-end">
                        <p class="fs-5 dark-purple">Member</p>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>
@endsection
