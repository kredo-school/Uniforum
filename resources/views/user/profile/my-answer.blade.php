@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    @include('user.profile.component.head')
    {{-- question, answer, team --}}
    <div class="w-85 mx-auto mt-5">
        <div class="row">
            <div class="col text-center">
                <a href="{{route('profile.view', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    my questions
                </a>
                @if (request()->is('profile/view/*'))
                <hr class="menu-hr mt-2">
                @endif
            </div>
            <div class="col text-center">
                <a href="{{route('profile.myanswer', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    my answers
                </a>
                @if (request()->is('profile/myanswer/*'))
                <hr class="menu-hr mt-2">
                @endif
            </div>
            <div class="col text-center">
                <a href="{{route('profile.myteam', $detail->id)}}" class="text-decoration-none dark-purple fs-5">
                    my teams
                </a>
                @if (request()->is('profile/myteam/*'))
                <hr class="menu-hr mt-2">
                @endif
            </div>
        </div>
        <div class="mt-3">
            @forelse ($my_answers as $my_answer)
            @if ($my_answer->question->deleted_at)
            <div class="deleted-content pt-2 px-4 mb-3">
                <div class="deleted-label w-20 ms-auto text-center mt-1">
                    <p class="fs-6 m-0">Deleted</p>
                </div>
                <div class="text-start my-1">
                    <h5 class="red text-start"><i class="fa-solid fa-ban"></i> This question has been deleted</h5>
                </div>
                <div class="text-end pb-1">
                    <span class="ms-3 light-red">{{$my_answer->question->deleted_at}}</span>
                </div>
            </div>
            @else
            <a href="{{route("question.show", $my_answer->question->id)}}#answer-{{$my_answer->id}}" class="text-decoration-none">
                <div class="q-content pt-2 px-4 mb-3">
                    <div class="category-label w-20 ms-auto text-center mt-1">
                        <p class="fs-6 m-0">{{$my_answer->question->category->name}}</p>
                    </div>
                    <div class="text-start my-1">
                        <h5 class="dark-purple text-start">{{$my_answer->question->title}}</h5>
                    </div>
                    <div class="text-end pb-1">
                        <i class="fa-regular fa-heart purple-gray"></i>
                        <span class="purple-gray">{{$my_answer->question->likes->count()}}</span>
                        <span class="ms-3 purple-gray">{{$my_answer->question->created_at->format('m/d/Y')}}</span>
                    </div>
                </div>
            </a>
            @endif
            @empty
            <div class="pt-5 text-center">
                <h3 class="mid-gray">No answers yet</h3>
            </div>
            @endforelse
            <div class="w-100 mt-4">
                {{ $my_answers->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
