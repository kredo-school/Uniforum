@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    {{-- <h1 class="text-uppercase dark-purple">home</h1> --}}
    <div class="text-center mt-4 w-85 mx-auto">
        <form action="{{route('search.question')}}" method="GET">
            @csrf
            <div class="row mx-auto">
                <div class="text-start search-bar p-1 col-9">
                    <div class="row">
                        <div class="col-1 my-auto">
                            <button type="submit" class="btn btn-none"><i class="fa-solid fa-magnifying-glass fs-4"></i></button>
                        </div>
                        <div class="col ms-2">
                            <input type="text" name="search_keyword" placeholder="search for questions" class="no-border w-100 bg-light-gray h-100 search-input">
                        </div>
                    </div>
                </div>
                <div class="col-3 my-auto">
                    <select class="form-select category-select" name="search_category">
                        <option disabled selected>Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-5 w-85 mx-auto text-center">
        @forelse ($home_questions as $question)
        <a href="{{route('question.show', $question->id)}}" class="text-decoration-none">
            <div class="q-content pt-2 pb-1 px-4 mb-3">
                <div class="category-label w-20 ms-auto text-center mt-1">
                    <p class="m-0">{{$question->category->name}}</p>
                </div>
                <div class="text-start my-1">
                    <h4 class="dark-purple text-start">{{$question->title}}</h4>
                </div>
                <div class="text-end">
                    <i class="fa-regular fa-heart purple-gray"></i>
                    <span class="purple-gray">{{$question->likes->count()}}</span>
                    <span class="ms-3 purple-gray">{{$question->created_at->format('m/d/Y')}}</span>
                </div>
            </div>
        </a>
        @empty
        <div class="py-5 text-center">
            <h2 class="mid-gray">No questions yet</h2>
            <a href="" class="dark-purple" data-bs-toggle="modal" data-bs-target="#ask-question-modal">Be the first questioner!</a>
        </div>
        @endforelse
        <div class="w-100 mt-4">
            {{ $home_questions->links() }}
        </div>
    </div>
</div>

@endsection
