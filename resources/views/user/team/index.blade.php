@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <div class="mt-4 w-85 mx-auto">
        <div class="row">
            <div class="search-bar p-1 col-9">
                <form action="{{route('team.search')}}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-1 my-auto">
                            <button type="submit" class="btn btn-none"><i class="fa-solid fa-magnifying-glass fs-4"></i></button>
                        </div>
                        <div class="col text-start">
                            <input type="text" name="team_keyword" placeholder="search for teams" class="no-border w-100 bg-light-gray h-100 search-input">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3 text-end my-auto p-0">
                <button type="button" class="ask-question-btn py-2 px-4" data-bs-toggle="modal" data-bs-target="#createTeamModal"><i class="fa-solid fa-plus"></i> Create team</button>
            </div>

            {{-- create team modal --}}
            <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="createTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                                <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Create Team</h3>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="mb-3">
                                        <input name="team_name" type="text" class="create-q-input px-2 py-1" placeholder="Team Name" value="{{ old('team_name')}}">
                                        @error('team_name')
                                        <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script type="text/javascript">
                                            $( document ).ready(function() {
                                                 $("#createTeamModal").modal('show');
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                    <div class="w-80 mx-auto mb-3">
                                        <input type="file" class="form-control" name="team_icon">
                                        <div class="text-end">
                                            <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                                        </div>
                                        @error('team_icon')
                                        <div class="uni-invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script type="text/javascript">
                                            $( document ).ready(function() {
                                                 $("#createTeamModal").modal('show');
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <select class="create-q-select px-1" name="team_type">
                                            <option selected disabled>Team Type</option>
                                            <option value="1">public</option>
                                            <option value="2">private</option>
                                        </select>
                                        @error('team_type')
                                        <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script type="text/javascript">
                                            $( document ).ready(function() {
                                                 $("#createTeamModal").modal('show');
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <textarea name="team_description" id="" rows="5" class="w-80 big-textarea px-3 py-2" placeholder="Description">{{ old('team_description')}}</textarea>
                                        @error('team_description')
                                        <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script type="text/javascript">
                                            $( document ).ready(function() {
                                                 $("#createTeamModal").modal('show');
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pb-3">
                                <div class="w-80 mx-auto row">
                                    <div class="col text-end">
                                        <button type="button" class="create-q-cancel py-1 w-100" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="create-q-post-btn w-100 py-1">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- showing team area --}}
            <div class="mt-5 p-0">

                {{-- invited --}}
                <div>
                    <h2 class="second-title text-start mb-3">Invited</h2>
                    @forelse ($inviting_teams as $inviting_team)
                    <div class="row mb-2">
                        <div class="col-10">
                            <a href="{{route('team.view', $inviting_team->team->id)}}" class="text-decoration-none">
                                <div class="team-content px-4">
                                    <div class="row py-3">
                                        <div class="col-auto d-flex align-items-center">
                                            @if ($inviting_team->team->icon)
                                            <img src="{{$inviting_team->team->icon}}" alt="" class="avatar-sm rounded">
                                            @else
                                            <i class="fa-solid fa-square icon-sm text-white"></i>
                                            @endif
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <h5 class="text-white text-start m-0">{{$inviting_team->team->name}}</h5>
                                        </div>
                                        <div class="col d-flex justify-content-end">
                                            <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> {{$inviting_team->team->user_team->count()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col my-auto">
                            <div class="w-80 mx-auto">
                                <form action="{{route('team.declineInvite')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="team_id" value="{{$inviting_team->team->id}}">
                                    <div class="row mb-1">
                                        <button type="submit" class="d-block cancel py-1"><i class="fa-solid fa-xmark"></i> decline</button>
                                    </div>
                                </form>
                                <form action="{{route('team.acceptInvite')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="team_id" value="{{$inviting_team->team->id}}">
                                    <div class="row">
                                        <button type="submit" class="d-block execute py-1"><i class="fa-solid fa-check"></i> accept</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="py-2 text-center">
                        <h3 class="mid-gray">No invitation yet</h3>
                    </div>
                    @endforelse
                </div>

                {{-- my team --}}
                <div class="mt-4">
                    <h2 class="second-title text-start mb-3">My Team</h2>
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
                    <div class="py-2 text-center">
                        <h3 class="mid-gray">No Team yet</h3>
                    </div>
                    @endforelse
                </div>

                {{-- Recommended --}}
                <div class="mt-4">
                    <h2 class="second-title text-start mb-3">Recommended</h2>
                    @forelse ($recommends as $recommend)
                    <a href="{{route('team.view', $recommend->id)}}" class="text-decoration-none">
                        <div class="team-content px-4 mb-3">
                            <div class="row py-3">
                                <div class="col-auto d-flex align-items-center">
                                    @if ($recommend->icon)
                                    <img src="{{$recommend->icon}}" alt="" class="avatar-sm rounded">
                                    @else
                                    <i class="fa-solid fa-square icon-sm text-white"></i>
                                    @endif
                                </div>
                                <div class="col d-flex align-items-center">
                                    <h5 class="text-white text-start m-0">{{$recommend->name}}</h5>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> {{$recommend->user_team->count()}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="py-2 text-center">
                        <h3 class="mid-gray">No Recommendation yet</h3>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
