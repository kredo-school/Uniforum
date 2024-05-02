@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Manage Members</h1>
    <div class="text-center mt-5 w-85 mx-auto">
        @foreach ($team_members as $member)
        <div class="row mb-4">
            <a href="" class="text-decoration-none col-auto">
                <div class="text-start">
                    <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                </div>
            </a>
            <a href="" class="text-decoration-none col my-auto">
                <div class="text-start ms-auto">
                    <p class="fs-5 m-0 thick-gray">{{$member->user->username}}</p>
                </div>
            </a>
            <div class="col-auto text-end my-auto">
                <p class="fs-5 m-0 dark-purple">
                    @if ($member->role == 1)
                    Owner
                    @elseif($member->role == 2)
                    Admin
                    @else
                    Member
                    @endif
                </p>
            </div>
            <div class="col-4 my-auto">
                @if ($member->role != 1)
                <div class="col my-auto">
                    <div class="row">
                        <div class="col-6 text-end">
                            <button type="button" class="cancel py-1 ms-auto w-100" data-bs-toggle="modal" data-bs-target="#confirm-kick-member-{{$member->user->id}}"><i class="fa-solid fa-user-minus"></i> kick</button>
                        </div>
                        @if($member->role == 2)
                        <div class="col-6 text-start">
                            <button type="button" class="d-inline demote py-1 w-100" data-bs-toggle="modal" data-bs-target="#confirm-demote-member-{{$member->user->id}}"><i class="fa-solid fa-circle-down"></i> demote</button>
                        </div>
                        @else
                        <div class="col-6 text-start">
                            <button type="button" class="d-inline promote py-1 w-100" data-bs-toggle="modal" data-bs-target="#confirm-promote-member-{{$member->user->id}}"><i class="fa-solid fa-circle-up"></i> promote</button>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            {{-- kick confirm popup --}}
            <form action="{{route('team.manage-members.kick', $team)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="user_id" value="{{$member->user->id}}">
                <input type="hidden" name="team_id" value="{{$team->id}}">
                <div class="modal fade" id="confirm-kick-member-{{$member->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header w-100 mx-auto ">
                                <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Kick Member</h3>
                            </div>
                            <div class="modal-body text-start">
                                <p>Are you sure you want to kick this member?</p>
                            </div>
                            <div class="modal-footer pb-3 border-0 pt-3">
                                <div class="w-100 mx-auto row">
                                    <div class="col text-start">
                                        <button type="button" class="create-q-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col text-end">
                                        <button type="submit" class="create-q-post-btn w-50 py-1">
                                            kick
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- promote confirm popup --}}
            <div class="modal fade" id="confirm-promote-member-{{$member->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header w-100 mx-auto ">
                            <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Promote Member</h3>
                        </div>
                        <div class="modal-body text-start">
                            <p>Are you sure you want to promote this member?</p>
                        </div>

                        <div class="modal-footer pb-3 border-0 pt-3">
                            <div class="w-100 mx-auto row">
                                <div class="col text-start">
                                    <button type="button" class="create-q-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="create-q-post-btn w-50 py-1">promote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- demote confirm popup --}}
            <div class="modal fade" id="confirm-demote-member-{{$member->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header w-100 mx-auto ">
                            <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Demote Member</h3>
                        </div>
                        <div class="modal-body text-start">
                            <p>Are you sure you want to demote this member?</p>
                        </div>
                        <div class="modal-footer pb-3 border-0 pt-3">
                            <div class="w-100 mx-auto row">
                                <div class="col text-start">
                                    <button type="button" class="create-q-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="create-q-post-btn w-50 py-1">demote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
