@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Admin</h1>
    {{-- for super admin page, the content inside should be wider than other pages --}}
    {{-- <div class="mt-4 w-100">  ←  <div class="mt-4 w-80 mx-auto"> --}}
    <div class="mt-4 w-100">
        <div class="row">
            <div class="col-3">
                @include('super-admin.users.content.menu')
            </div>
            <div class="col-9">
                <table class="table table-hover align-middle bg-white border w-100">
                    <thead class="w-100">
                      <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <th>OWNER</th>
                        <th>CREATED AT</th>
                        <th>REPORT</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="w-100">
                        @forelse ($all_questions as $question)
                        <tr class="">
                            <td>{{$question->id}}</td>
                            <td class="">
                                {{$question->title}}
                            </td>
                            <td class="">{{$question->category->name}}</td>
                            <td class="">{{$question->user->username}}</td>
                            <td class="">{{$question->created_at->format('m/d/Y')}}</td>
                            <td>{{$question->question_report->count()}}</td>
                            <td class="">
                                @if ($question->deleted_at)
                                <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Hidden
                                @else
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Visible
                                @endif
                            </td>
                            <td class="">
                                @if($question->deleted_at)
                                {{-- if the user is deactivated --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item dark-purple" data-bs-toggle="modal" data-bs-target="#show-question-{{$question->id}}">
                                            <i class="fa-solid fa-user"></i> Show question
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="show-question-{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto">
                                                <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Show Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="dark-purple">Are you sure you want to show this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="{{route('super-admin.questions.activate', $question->id)}}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="execute w-50 py-1">Show</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 @else
                                {{-- if the question is active --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-question-{{$question->id}}">
                                            <i class="fa-solid fa-eye-slash"></i> Hide
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route("question.show", $question->id)}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.questions.report')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- hide question popup --}}
                                <div class="modal fade" id="hide-question-{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Hide Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to hide this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="{{route('super-admin.questions.deactivate', $question->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Hide</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <div class="py-4 text-center">
                            <h2 class="mid-gray">No Questions</h2>
                        </div>
                        @endforelse


                    </tbody>
                </table>
                <div class="w-100 mt-4">
                    {{ $all_questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
