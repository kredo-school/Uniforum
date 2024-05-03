@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Invite Members</h1>
    <div class="text-center mt-5 w-85 mx-auto">

        @include('user.team.component.invite.head')

        <div class="">
            <h2 class="second-title text-start mb-4">Search Result of: {{$old_keyword}}</h2>
            @forelse ($suggestions as $suggestion)
            <div class="row mb-4">
                <a href="" class="text-decoration-none col-auto">
                    <div class="text-start">
                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                    </div>
                </a>
                <a href="" class="text-decoration-none col my-auto">
                    <div class="text-start ms-auto">
                        <p class="fs-5 m-0 thick-gray">{{$suggestion->username}}</p>
                    </div>
                </a>
                <div class="col-4 my-auto text-end">
                    <div class="row my-auto">
                        <div class="col-6 text-end">
                        </div>
                        <div class="col-6 text-start">
                            @if ($suggestion->isInvited($team->id))
                            <div class="d-block cancel py-1 w-100 text-center">Invited</div>
                            @else
                            <form action="{{route('team.invite-members.invite', $team)}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$suggestion->id}}">
                                <button type="submit" class="d-block execute py-1 w-100"><i class="fa-solid fa-user-plus"></i> Invite</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="pt-4 text-center">
                <h3 class="mid-gray">No results</h3>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
