@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    @include('user.team.component.view.head')
    <div class="mt-5 w-85 mx-auto">
        <div class="row">
            <div class="col text-center">
                <a href="{{route('team.view', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    questions
                </a>
                {{-- <hr class="menu-hr mt-2"> --}}
            </div>
            <div class="col text-center">
                <a href="{{route('team.view.member', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    members
                </a>
                <hr class="menu-hr mt-2">
            </div>
        </div>
        <div class="mt-3">
            @foreach ($team_members as $member)
            <a href="{{route('profile.view', $member->user->id)}}" class="text-decoration-none">
                <div class="row mb-4">
                    <div class="col-1 text-center">
                        @if ($member->user->avatar)
                        <img src="{{$member->user->avatar}}" alt="" class="avatar-sm rounded-circle">
                        @else
                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                        @endif
                    </div>
                    <div class="col ms-auto d-flex align-items-center">
                        <p class="fs-5 m-0 thick-gray">{{$member->user->username}}</p>
                    </div>
                    <div class="col text-end">
                        <p class="fs-5 dark-purple">
                            @if ($member->role == 1)
                            Owner
                            @elseif ($member->role == 2)
                            Admin
                            @else
                            Member
                            @endif
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
            <div class="w-100 mt-4">
                {{ $team_members->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
