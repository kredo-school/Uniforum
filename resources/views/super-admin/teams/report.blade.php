@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="text-uppercase dark-purple">Report for Team ID: 1</h1>
    {{-- if there are some reports --}}
    <div class="mt-5 w-85 mx-auto">

        <div class="q-content pt-2 pb-1 px-4 mb-3">
            <div class="category-label w-20 ms-auto text-center mt-1">
                <p>Violent Expression</p>
            </div>
            <div class="text-start">
                <h4 class="dark-purple text-start">This team facilitates violent expression by using a lot of curse words targeting certain group of people.</h4>
            </div>
            <div class="text-end mb-2">
                <span class="purple-gray">Report user ID: 2</span>
                <span class="ms-3 purple-gray">2024/3/26 15:05</span>
            </div>
        </div>

        <div class="q-content pt-2 pb-1 px-4 mb-3">
            <div class="category-label w-20 ms-auto text-center mt-1">
                <p>Hate Speech</p>
            </div>
            <div class="text-start">
                <h4 class="dark-purple text-start">This team encourages discriminative content towards some groups of people.</h4>
            </div>
            <div class="text-end mb-2">
                <span class="purple-gray">Report user ID: 2</span>
                <span class="ms-3 purple-gray">2024/3/26 15:05</span>
            </div>
        </div>
    </div>
    {{-- if there is no reports --}}
    {{-- <div class="mt-5 w-85 mx-auto">
        <h2 class="second-title text-center">There is no reports yet.</h2>
    </div> --}}
</div>
@endsection
