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
                <hr class="menu-hr mt-2">
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
                {{-- <hr class="menu-hr mt-2"> --}}
            </div>
        </div>
        <div class="mt-3">
            <a href="" class="text-decoration-none">
                <div class="q-content pt-2 px-4 mb-2">
                    <div class="category-label w-20 ms-auto text-center">
                        <p class="fs-6">Club</p>
                    </div>
                    <div class="text-start">
                        <h5 class="dark-purple text-start">How can I join the Kredo Soccer Club?</h5>
                    </div>
                    <div class="text-end">
                        <form action="">
                            <button type="submit" class="btn btn-none px-0">
                                <i class="fa-regular fa-heart purple-gray"></i>
                            </button>
                            <span class="purple-gray">1</span>
                            <span class="ms-3 purple-gray">3/26/2024 15:05</span>
                        </form>
                    </div>
                </div>
            </a>

            <a href="" class="text-decoration-none">
                <div class="q-content pt-2 px-4 mb-2">
                    <div class="category-label w-20 ms-auto text-center">
                        <p class="fs-6">Club</p>
                    </div>
                    <div class="text-start">
                        <h5 class="dark-purple text-start">How can I join the Kredo Soccer Club?</h5>
                    </div>
                    <div class="text-end">
                        <form action="">
                            <button type="submit" class="btn btn-none px-0">
                                <i class="fa-regular fa-heart purple-gray"></i>
                            </button>
                            <span class="purple-gray">1</span>
                            <span class="ms-3 purple-gray">3/26/2024 15:05</span>
                        </form>
                    </div>
                </div>
            </a>

        </div>
    </div>

</div>
@endsection
