@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Invite Members</h1>
    <div class="text-center mt-5 w-85 mx-auto">

        @include('user.team.component.invite.head')

        <div class="">
            <h2 class="second-title text-start mb-4">Enroll Request</h2>
            @forelse ($appliers as $applier)
            <div class="row mb-4">
                <a href="{{route('profile.view', $applier->user->id)}}" class="text-decoration-none col-auto">
                    <div class="text-start">
                        @if ($applier->user->avatar)
                        <img src="{{$applier->user->avatar}}" alt="" class="avatar-sm rounded-circle">
                        @else
                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                        @endif
                    </div>
                </a>
                <a href="{{route('profile.view', $applier->user->id)}}" class="text-decoration-none col my-auto">
                    <div class="text-start ms-auto">
                        <p class="fs-5 m-0 thick-gray">{{$applier->user->username}}</p>
                    </div>
                </a>
                <div class="col-4 my-auto text-end">
                    <div class="row my-auto">
                        <div class="col-6 text-end">
                            <form action="{{route('team.invite-members.decline', $team)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user_id" value="{{$applier->user->id}}">
                                <button type="submit" class="d-block cancel py-1 w-100"><i class="fa-solid fa-xmark"></i> decline</button>
                            </form>
                        </div>
                        <div class="col-6 text-start">
                            <form action="{{route('team.invite-members.accept', $team)}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$applier->user->id}}">
                                <button type="submit" class="d-block execute py-1 w-100"><i class="fa-solid fa-check"></i> accept</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="pt-4 text-center">
                <h3 class="mid-gray">No applier yet</h3>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
