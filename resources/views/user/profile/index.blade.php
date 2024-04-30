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
                <a href="{{route('profile.myanswer', $detail)}}" class="text-decoration-none dark-purple fs-5">
                    my answers
                </a>
                @if (request()->is('profile/myanswer/*'))
                <hr class="menu-hr mt-2">
                @endif
            </div>
            <div class="col text-center">
                <a href="{{route('profile.myteam')}}" class="text-decoration-none dark-purple fs-5">
                    my teams
                </a>
                @if (request()->is('profile/myteam/*'))
                <hr class="menu-hr mt-2">
                @endif
            </div>
        </div>
        <div class="mt-3">
            @forelse ($my_questions as $my_question)
            <a href="{{route('question.show', $my_question->id)}}" class="text-decoration-none">
                <div class="q-content pt-2 px-4 mb-3">
                    <div class="category-label w-20 ms-auto text-center mt-1">
                        <p class="fs-6 m-0">{{$my_question->category->name}}</p>
                    </div>
                    <div class="text-start my-1">
                        <h5 class="dark-purple text-start">{{$my_question->title}}</h5>
                    </div>
                    <div class="text-end pb-1">
                        <i class="fa-regular fa-heart purple-gray"></i>
                        <span class="purple-gray">{{$my_question->likes->count()}}</span>
                        <span class="ms-3 purple-gray">{{$my_question->created_at->format('m/d/Y')}}</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="pt-5 text-center">
                <h3 class="mid-gray">No Questions yet</h3>
            </div>
            @endforelse
            <div class="w-100 mt-4">
                {{ $my_questions->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
