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
                        <th>QUESTION ID</th>
                        <th>OWNER</th>
                        <th>CREATED AT</th>
                        <th>REPORT</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="w-100">
                        @forelse ($all_answers as $answer)
                        <tr class="">
                            <td>{{$answer->id}}</td>
                            <td class="">
                                {{$answer->question->id}}
                            </td>
                            <td class="">{{$answer->user->username}}</td>
                            <td class="">{{$answer->created_at->format('Y/m/d')}}</td>
                            <td>{{$answer->answer_report->count()}}</td>
                            <td class="">
                                @if ($answer->deleted_at)
                                <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Hidden
                                @else
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Visible
                                @endif
                            </td>
                            <td class="">
                                @if ($answer->deleted_at)
                                {{-- if the answer is deactivated --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item dark-purple" data-bs-toggle="modal" data-bs-target="#show-answer-{{$answer->id}}">
                                            <i class="fa-solid fa-user"></i> Show answer
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="show-answer-{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto">
                                                <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Show Answer</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="dark-purple">Are you sure you want to show this answer?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="{{route('super-admin.answers.activate', $answer->id)}}" method="POST">
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
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-answer-{{$answer->id}}">
                                            <i class="fa-solid fa-eye-slash"></i> Hide
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route("question.show", $answer->question->id)}}#answer-{{$answer->id}}" class="dropdown-item thick-gray">
                                            {{-- put the answer-id in route --}}
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.answers.report', $answer->id)}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- hide question popup --}}
                                <div class="modal fade" id="hide-answer-{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <form action="{{route('super-admin.answers.deactivate', $answer->id)}}" method="POST">
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
                        <tr class="py-4 text-center">
                            <h2 class="mid-gray">No Answers</h2>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="w-100 mt-4">
                    {{ $all_answers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
