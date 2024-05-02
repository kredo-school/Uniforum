@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Edit Team Profile</h1>
    <div class="text-center mt-4 w-85 mx-auto">
        <form action="{{route('team.update', $team)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col profile-left py-5 px-1">
                    <div class="text-center pt-4 pb-2">
                        @if ($team->icon)
                        <img src="{{$team->icon}}" class="avatar-lg rounded" alt="">
                        @else
                        <i class="fa-solid fa-square icon-lg light-gray"></i>
                        @endif
                    </div>
                    <div class="w-85 mx-auto mt-5">
                        <input type="file" id="avatar" class="form-control" name="update_team_icon">
                        <div class="">
                            <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                        </div>
                        @error('update_team_icon')
                        <div class="uni-invalid-feedback text-start w-100" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col profile-right">
                    <div class="py-5 px-3">
                        <div class="form-group text-start mb-3">
                            <label for="" class="dark-purple">Team Name</label>
                            <input type="text" class="profile-input d-block w-100 py-1 px-2" value="{{$team->name}}" name="update_team_name">
                            @error('update_team_name')
                            <div class="uni-invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group text-start mb-3">
                            <label for="" class="dark-purple">Team Type</label>
                            <select class="group-type-select px-1" name="update_team_type">
                                <option
                                @if ($team->type == 1)
                                selected
                                @endif
                                value="1">public</option>
                                <option
                                @if ($team->type == 2)
                                selected
                                @endif
                                value="2">private</option>
                            </select>
                            @error('update_team_type')
                            <div class="uni-invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group text-start">
                            <label for="" class="dark-purple">Description</label>
                            <textarea name="update_team_description" id="" rows="5" class="w-100 big-textarea px-2 py-2 mb-2">{{$team->description}}</textarea>
                            @error('update_team_description')
                            <div class="uni-invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="col text-end">
                    <button type="button" class="create-q-cancel py-1 w-100" onclick="history.back()">Cancel</button>
                </div>
                <div class="col">
                    {{-- change to modal button --}}
                    <button type="button" class="create-q-post-btn py-1 w-100" data-bs-toggle="modal" data-bs-target="#confirmEditTeamProfile">Edit</button>
                </div>
            </div>

            {{-- Edit Profile Popup --}}
            <div class="modal fade" id="confirmEditTeamProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header w-100 mx-auto ">
                      <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Edit Team Profile</h3>
                    </div>
                    <div class="modal-body text-start">
                      <p>Are you sure you want to edit this team profile?</p>
                    </div>
                    <div class="modal-footer pb-3 border-0 pt-3">
                        <div class="w-100 mx-auto row">
                            <div class="col text-start">
                                <button type="button" class="create-q-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col text-end">
                                <button type="submit" class="create-q-post-btn w-50 py-1">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
