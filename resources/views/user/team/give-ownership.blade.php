@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Give Ownership</h1>
    <div class="text-center mt-5 w-80 mx-auto">
        @forelse ($team_admins as $admin)
        <div class="row mb-4">
            <a href="{{route('profile.view', $admin->user->id)}}" class="text-decoration-none col-auto">
                <div class="text-start">
                    @if ($admin->user->avatar)
                    <img src="{{$admin->user->avatar}}" alt="" class="avatar-sm rounded-circle">
                    @else
                    <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                    @endif
                </div>
            </a>
            <a href="{{route('profile.view', $admin->user->id)}}" class="text-decoration-none col my-auto">
                <div class="text-start ms-auto">
                    <p class="fs-5 m-0 thick-gray">{{$admin->user->username}}</p>
                </div>
            </a>
            <div class="col-auto text-end my-auto">
                <p class="fs-5 m-0 dark-purple">
                    Admin
                </p>
            </div>
            <div class="col-3 my-auto">
                <button type="button" class="d-inline promote py-1 w-100" data-bs-toggle="modal" data-bs-target="#confirm-give-ownership-{{$admin->user->id}}"><i class="fa-solid fa-crown"></i> give ownership</button>
            </div>

            {{-- kick confirm popup --}}
            <form action="{{route('team.give-ownership.give', $team)}}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="user_id" value="{{$admin->user->id}}">
                <div class="modal fade" id="confirm-give-ownership-{{$admin->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header w-100 mx-auto ">
                                <h3 class="modal-title red" id="exampleModalLongTitle">Give Ownership to {{$admin->user->username}}</h3>
                            </div>
                            <div class="modal-body text-start">
                                <p class="red">Are you sure you want to give this member the ownership?</p>
                                <p class="mid-gray">*You will be degraded to admin after this action.</p>
                            </div>
                            <div class="modal-footer pb-3 border-0 pt-3">
                                <div class="w-100 mx-auto row">
                                    <div class="col text-start">
                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col text-end">
                                        <button type="submit" class="delete-team-post-btn w-50 py-1">
                                            Give
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @empty
        <div class="py-4 text-center">
            <h3 class="mid-gray">No Admins yet</h3>
        </div>
        @endforelse
    </div>
</div>
@endsection
