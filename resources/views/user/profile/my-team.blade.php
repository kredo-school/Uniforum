@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    @include('user.profile.component.head')
    {{-- question, answer, team --}}
    <div class="w-85 mx-auto mt-5">
        <div class="row">
            <div class="col text-center">
                <a href="{{route('profile')}}" class="text-decoration-none dark-purple fs-5">
                    my questions
                </a>
                {{-- <hr class="menu-hr mt-2"> --}}
            </div>
            <div class="col text-center">
                <a href="{{route('profile.myanswer')}}" class="text-decoration-none dark-purple fs-5">
                    my answers
                </a>
                {{-- <hr class="menu-hr mt-2"> --}}
            </div>
            <div class="col text-center">
                <a href="{{route('profile.myteam')}}" class="text-decoration-none dark-purple fs-5">
                    my teams
                </a>
                <hr class="menu-hr mt-2">
            </div>
        </div>
        <div class="mt-3">
            <a href="{{route('team.view')}}" class="text-decoration-none">
                <div class="team-content px-4 mb-2">
                    <div class="row py-3">
                        <div class="col-auto d-flex align-items-center">
                            <i class="fa-solid fa-circle-user icon-sm text-white"></i>
                        </div>
                        <div class="col d-flex align-items-center">
                            <h5 class="text-white text-start">Kredo Soccer Team</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> 100</span>
                        </div>
                    </div>
                    {{-- <div class="text-end mb-2">
                        <span class="text-white"><i class='fa-solid fa-user'></i> 100</span>
                    </div> --}}
                </div>
            </a>
        </div>
    </div>

</div>
@endsection
