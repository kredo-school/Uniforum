@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    @include('user.team.component.view.head')
    {{-- after joined --}}
    @if ($detail->membered() || Auth::user()->role_id == 1)
    <div class="mt-5 w-85 mx-auto">
        <div class="row">
            <div class="col text-center">
                <a href="{{route('team.view', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    questions
                </a>
                <hr class="menu-hr mt-2">
            </div>
            <div class="col text-center">
                <a href="{{route('team.view.member', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    members
                </a>
            </div>
        </div>
        <div class="mt-2">
            <div class="mb-3 text-end">
                <button type="button" class="ask-question-btn py-2 px-4" data-bs-toggle="modal" data-bs-target="#createTeamQuestionModal"><i class="fa-solid fa-pen-to-square"></i> Ask question in this team</button>
            </div>
            {{-- ask question within Team --}}
            <form action="{{route('question.ask-team')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="createTeamQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                                <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Ask Question in {{$detail->name}}</h3>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="team_id" value="{{$detail->id}}">
                                <div class="text-center">
                                    <div class="mb-2">
                                        <input name="q_t_title" type="text" class="create-q-input px-2 py-1" placeholder="Title" value="{{ old('q_t_title') }}">
                                        @error('q_t_title')
                                        <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script type="text/javascript">
                                            $( document ).ready(function() {
                                                 $('#createTeamQuestionModal').modal('show');
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <select class="create-q-select px-1" name="q_t_category">
                                            <option selected disabled>Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('q_t_category')
                                        <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script type="text/javascript">
                                            $( document ).ready(function() {
                                                 $('#createTeamQuestionModal').modal('show');
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <textarea name="q_t_content" id="" rows="5" class="w-80 big-textarea px-2 py-2" placeholder=" Write your question in here!">{{ old('q_t_content') }}</textarea>
                                        @error('q_t_content')
                                        <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script type="text/javascript">
                                            $( document ).ready(function() {
                                                 $('#createTeamQuestionModal').modal('show');
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                    <div class="w-80 mx-auto">
                                        <input type="file" class="form-control" name="q_t_image">
                                        <div class="text-end">
                                            <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                                        </div>
                                        @error('q_t_image')
                                        <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script type="text/javascript">
                                            $( document ).ready(function() {
                                                 $('#createTeamQuestionModal').modal('show');
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
            @forelse ($team_questions as $team_question)
            <a href="{{route('question.show', $team_question->id)}}" class="text-decoration-none">
                <div class="q-content pt-2 px-4 mb-3">
                    <div class="category-label w-20 ms-auto text-center mt-1">
                        <p class="fs-6 m-0">{{$team_question->category->name}}</p>
                    </div>
                    <div class="text-start my-1">
                        <h5 class="dark-purple text-start">{{$team_question->title}}</h5>
                    </div>
                    <div class="text-end pb-1">
                        <form action="">
                            <i class="fa-regular fa-heart purple-gray"></i>
                            <span class="purple-gray">{{$team_question->likes->count()}}</span>
                            <span class="ms-3 purple-gray">{{$team_question->created_at->format('m/d/Y')}}</span>
                        </form>
                    </div>
                </div>
            </a>
            @empty
            <div class="pt-5 text-center">
                <h3 class="mid-gray">No questions yet</h3>
            </div>
            @endforelse
            <div class="w-100 mt-4">
                {{ $team_questions->links() }}
            </div>
        </div>
    </div>
    @endif

</div>
@endsection
