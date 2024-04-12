@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    {{-- <div class="row">
        <div class="col">
            <h1 class="dark-purple">Team</h1>
        </div>
        <div class="col text-end">
            <button type="button" class="ask-question-btn py-2 px-3" data-bs-toggle="modal" data-bs-target="#createTeamModal"><i class="fa-solid fa-plus"></i> Create team</button>
        </div>
    </div> --}}
    {{-- <div class="col text-end">
        <button type="button" class="ask-question-btn py-2 px-3" data-bs-toggle="modal" data-bs-target="#createTeamModal"><i class="fa-solid fa-plus"></i> Create team</button>
    </div> --}}
    <div class="mt-4 w-85 mx-auto">
        <div class="row">
            <div class="search-bar p-1 col-9">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-1 my-auto">
                            <button type="submit" class="btn btn-none"><i class="fa-solid fa-magnifying-glass fs-4"></i></button>
                        </div>
                        <div class="col text-start">
                            <input type="text" placeholder="search for questions" class="no-border w-100 bg-light-gray h-100 search-input">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3 text-end my-auto p-0">
                <button type="button" class="ask-question-btn py-2 px-4" data-bs-toggle="modal" data-bs-target="#createTeamModal"><i class="fa-solid fa-plus"></i> Create team</button>
            </div>

            {{-- create team modal --}}
            <div class="modal fade" id="createTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                      <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Create Team</h3>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST">
                        @csrf
                        <div class="text-center">
                            <input id="team_name" type="text" class="create-q-input px-2 mb-3 py-1" required placeholder="Team Name">

                            <div class="w-80 mx-auto mb-3">
                                <input type="file" class="form-control">
                                <div class="text-end">
                                    <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                                </div>
                            </div>

                            <select class="create-q-select px-1 mb-3">
                                <option selected>Team Type</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <textarea name="" id="" rows="5" class="w-80 big-textarea px-3 py-2" placeholder="Description"></textarea>
                        </div>
                      </form>
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
        {{-- <form action="" method="POST">
            @csrf
            <div class="search-bar p-1 mx-auto">
                <div class="row">
                    <div class="col-1 my-auto me-0">
                        <button type="submit" class="btn btn-none"><i class="fa-solid fa-magnifying-glass fs-4"></i></button>
                    </div>
                    <div class="col ps-0">
                        <input type="text" placeholder="search for teams" class="no-border w-100 bg-light-gray h-100 search-input">
                    </div>
                </div>
            </div>
        </form> --}}
        {{-- showing team area --}}
        <div class="mt-5 p-0">

            {{-- invited --}}
            <div>
                <h2 class="second-title text-start mb-3">Invited</h2>
                <div class="row mb-2">
                    <div class="col-10">
                        <a href="{{route('team.view')}}" class="text-decoration-none">
                            <div class="team-content px-4">
                                <div class="row py-3">
                                    <div class="col-auto d-flex align-items-center">
                                        <i class="fa-solid fa-square icon-sm text-white"></i>
                                    </div>
                                    <div class="col d-flex align-items-center">
                                        <h5 class="text-white text-start m-0">Kredo Soccer Team</h5>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> 100</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col my-auto">
                        <div class="w-80 mx-auto">
                            <div class="row mb-1">
                                <button type="button" class="d-block cancel py-1"><i class="fa-solid fa-xmark"></i> decline</button>
                            </div>
                            <div class="row">
                                <button type="button" class="d-block execute py-1"><i class="fa-solid fa-check"></i> accept</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- my team --}}
            <div class="mt-4">
                <h2 class="second-title text-start mb-3">My Team</h2>
                <a href="{{route('team.view')}}" class="text-decoration-none">
                    <div class="team-content px-4 mb-3">
                        <div class="row py-3">
                            <div class="col-auto d-flex align-items-center">
                                <i class="fa-solid fa-square icon-sm text-white"></i>
                            </div>
                            <div class="col d-flex align-items-center">
                                <h5 class="text-white text-start m-0">Kredo Soccer Team</h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> 100</span>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{route('team.view')}}" class="text-decoration-none mb-2">
                    <div class="team-content px-4 mb-3">
                        <div class="row py-3">
                            <div class="col-auto d-flex align-items-center">
                                <i class="fa-solid fa-square icon-sm text-white"></i>
                            </div>
                            <div class="col d-flex align-items-center">
                                <h5 class="text-white text-start m-0">Kredo Soccer Team</h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> 100</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Recommended --}}
            <div class="mt-4">
                <h2 class="second-title text-start mb-3">Recommended</h2>
                <a href="{{route('team.view')}}" class="text-decoration-none">
                    <div class="team-content px-4 mb-3">
                        <div class="row py-3">
                            <div class="col-auto d-flex align-items-center">
                                <i class="fa-solid fa-square icon-sm text-white"></i>
                            </div>
                            <div class="col d-flex align-items-center">
                                <h5 class="text-white text-start m-0">Kredo Soccer Team</h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> 100</span>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{route('team.view')}}" class="text-decoration-none mb-2">
                    <div class="team-content px-4 mb-3">
                        <div class="row py-3">
                            <div class="col-auto d-flex align-items-center">
                                <i class="fa-solid fa-square icon-sm text-white"></i>
                            </div>
                            <div class="col d-flex align-items-center">
                                <h5 class="text-white text-start m-0">Kredo Soccer Team</h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <span class="text-white mt-auto"><i class='fa-solid fa-user'></i> 100</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
