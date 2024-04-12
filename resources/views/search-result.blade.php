@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    {{-- <h1 class="text-uppercase dark-purple">home</h1> --}}
    <div class="text-center mt-4 w-85 mx-auto">
        <form action="" method="POST">
            @csrf
            <div class="row mx-auto">
                <div class="text-start search-bar p-1 col-9">
                    <div class="row">
                        <div class="col-1 my-auto">
                            <button type="submit" class="btn btn-none"><i class="fa-solid fa-magnifying-glass fs-4"></i></button>
                        </div>
                        <div class="col ms-2">
                            <input type="text" placeholder="search for questions" class="no-border w-100 bg-light-gray h-100 search-input">
                        </div>
                    </div>
                </div>
                <div class="col-3 my-auto">
                    <select class="form-select category-select">
                        <option selected>Category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-5 w-85 mx-auto">
        <h2 class="second-title mb-4">Search Result for : keyword</h2>
        <a href="{{route('view')}}" class="text-decoration-none">
            <div class="q-content pt-2 pb-1 px-4 mb-3">
                <div class="category-label w-20 ms-auto text-center mt-1">
                    <p>Club</p>
                </div>
                <div class="text-start">
                    <h4 class="dark-purple text-start">How can I join the Kredo Soccer Club?</h4>
                </div>
                <div class="text-end">
                    <form action="">
                        <button type="submit" class="btn btn-none px-0">
                            <i class="fa-regular fa-heart purple-gray"></i>
                        </button>
                        <span class="purple-gray">1</span>
                        <span class="ms-3 purple-gray">2024/3/26 15:05</span>
                    </form>
                </div>
            </div>
        </a>
        <a href="{{route('view')}}" class="text-decoration-none">
            <div class="q-content pt-2 pb-1 px-4 mb-3">
                <div class="category-label w-20 ms-auto text-center mt-1">
                    <p>Club</p>
                </div>
                <div class="text-start">
                    <h4 class="dark-purple text-start">How can I join the Kredo Soccer Club?</h4>
                </div>
                <div class="text-end">
                    <form action="">
                        <button type="submit" class="btn btn-none px-0">
                            <i class="fa-regular fa-heart purple-gray"></i>
                        </button>
                        <span class="purple-gray">1</span>
                        <span class="ms-3 purple-gray">2024/3/26 15:05</span>
                    </form>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
