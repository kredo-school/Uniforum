@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    @include('user.profile.component.head')
    {{-- question, answer, team --}}
    <div class="w-85 mx-auto mt-5">
        <div class="row">
            <div class="col text-center">
                <a href="{{route('profile.view', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    my questions
                </a>
                {{-- <hr class="menu-hr mt-2"> --}}
            </div>
            <div class="col text-center">
                <a href="{{route('profile.myanswer', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    my answers
                </a>
                {{-- <hr class="menu-hr mt-2"> --}}
            </div>
            <div class="col text-center">
                <a href="{{route('profile.myteam', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    my teams
                </a>
                <hr class="menu-hr mt-2">
            </div>
        </div>
        <div class="mt-3">
            @forelse ($my_teams as $my_team)
            <a href="{{route('team.view', $my_team->team->id)}}" class="text-decoration-none">
                <div class="team-content px-4 mb-3">
                    <div class="row py-3">
                        <div class="col-auto d-flex align-items-center">
                            @if ($my_team->team->icon)
                            <img src="{{$my_team->team->icon}}" alt="" class="avatar-sm rounded">
                            @else
                            <i class="fa-solid fa-square icon-sm text-white"></i>
                            @endif
                        </div>
                        <div class="col d-flex align-items-center">
                            <h5 class="text-white text-start m-0">{{$my_team->team->name}}</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> {{$my_team->team->user_team->count()}}</span>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="pt-5 text-center">
                <h3 class="mid-gray">No Teams yet</h3>
            </div>
            @endforelse
            <div class="w-100 mt-4">
                {{ $my_teams->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
