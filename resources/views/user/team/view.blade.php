@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    @include('user.team.component.view.head')
    {{-- after joined --}}
    <div class="mt-5 w-85 mx-auto">
        <div class="row">
            <div class="col text-center">
                <a href="{{route('team.view')}}" class="text-decoration-none dark-purple fs-5">
                    questions
                </a>
                <hr class="menu-hr mt-2">
            </div>
            <div class="col text-center">
                <a href="{{route('team.view.member')}}" class="text-decoration-none dark-purple fs-5">
                    members
                </a>
                {{-- <hr class="menu-hr mt-2"> --}}
            </div>
        </div>
        <div class="mt-2">
            <div class="mb-3 text-end">
                <button type="button" class="ask-question-btn py-2 px-4" data-bs-toggle="modal" data-bs-target="#createTeamQuestionModal"><i class="fa-solid fa-pen-to-square"></i> Ask question in this team</button>
            </div>
            {{-- ask question within Team --}}
            <div class="modal fade" id="createTeamQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                            <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Ask Question to Your Team</h3>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="text-center">
                                    <input id="title" type="text" class="create-q-input px-2 mb-2 py-1" required placeholder="Title">
                                    <select class="create-q-select px-1 mb-2">
                                        <option selected>Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <textarea name="" id="" rows="5" class="w-80 big-textarea px-2 py-2 mb-2" placeholder=" Write your question in here!"></textarea>
                                    <div class="w-80 mx-auto">
                                        <input type="file" class="form-control">
                                        <div class="text-end">
                                            <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                                        </div>
                                    </div>
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
            <a href="{{route('view')}}" class="text-decoration-none">
                <div class="q-content pt-2 px-4 mb-2">
                    <div class="category-label w-20 ms-auto text-center">
                        <p class="fs-6">Club</p>
                    </div>
                    <div class="text-start">
                        <h5 class="dark-purple text-start">How can I join the Kredo Soccer Club?</h5>
                    </div>
                    <div class="text-end">
                        <form action="">
                            <button type="submit" class="btn btn-none px-0">
                                <i class="fa-regular fa-heart purple-gray"></i>
                            </button>
                            <span class="purple-gray">1</span>
                            <span class="ms-3 purple-gray">3/26/2024 15:05</span>
                        </form>
                    </div>
                </div>
            </a>

            <a href="{{route('view')}}" class="text-decoration-none">
                <div class="q-content pt-2 px-4 mb-2">
                    <div class="category-label w-20 ms-auto text-center">
                        <p class="fs-6">Club</p>
                    </div>
                    <div class="text-start">
                        <h5 class="dark-purple text-start">How can I join the Kredo Soccer Club?</h5>
                    </div>
                    <div class="text-end">
                        <form action="">
                            <button type="submit" class="btn btn-none px-0">
                                <i class="fa-regular fa-heart purple-gray"></i>
                            </button>
                            <span class="purple-gray">1</span>
                            <span class="ms-3 purple-gray">3/26/2024 15:05</span>
                        </form>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
