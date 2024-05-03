@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Team Setting</h1>
    <div class="text-center mt-5 w-85 mx-auto">
        <div class="row">
            <div class="row text-start">
                <h4 class="thick-gray">Edit Team Profile</h4>
            </div>
            <div class="row w-25 ms-auto mt-3">
                <a href="{{route('team.edit', $team)}}" class="text-decoration-none">
                    {{-- <p class="m-0 text-center execute py-1">Edit</p> --}}
                    <div class="text-center execute py-1">Edit</div>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="row text-start">
                <h4 class="thick-gray">Manage Members</h4>
            </div>
            <div class="row w-25 ms-auto mt-3">
                <a href="{{route('team.manage-members', $team)}}" class="text-decoration-none">
                    <p class="m-0 text-center execute py-1">Manage</p>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="row text-start">
                <h4 class="thick-gray">Invite Users</h4>
            </div>
            <div class="row w-25 ms-auto mt-3">
                <a href="{{route('team.invite-members', $team)}}" class="text-decoration-none">
                    <p class="m-0 text-center execute py-1">Invite</p>
                </a>
            </div>
        </div>
        <hr>
        @if ($team->isTeamOwner())
        {{-- if owner --}}
        <div class="row">
            <div class="row text-start">
                <h4 class="red">Delete Team</h4>
            </div>
            <div class="row w-25 ms-auto mt-3">
                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#deleteTeamModal">
                    <p class="m-0 text-center delete py-1">Delete</p>
                </a>
            </div>
        </div>
        <hr>
        {{-- delete team modal --}}
        <div class="modal fade" id="deleteTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header w-100 mx-auto ">
                        <h3 class="modal-title red" id="exampleModalLongTitle">Delete Team</h3>
                    </div>
                    <form action="{{route('team.delete', $team)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body text-start">
                            <p class="red fs-5">Are you sure you want to delete this team?</p>
                            <p class="mid-gray fs-6 px-1">You cannot undone this action.</p>
                        </div>
                        <div class="modal-footer pb-3 border-0 pt-3">
                            <div class="w-100 mx-auto row">
                                <div class="col text-start">
                                    <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="delete-team-post-btn w-50 py-1">Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
