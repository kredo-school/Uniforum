@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="text-uppercase dark-purple">Report for Team ID: {{$team_id}}</h1>
    {{-- if there are some reports --}}
    <div class="mt-5 w-85 mx-auto">
        @forelse ($reports as $report)
        <div class="q-content pt-2 pb-1 px-4 mb-3">
            <div class="category-label w-20 ms-auto text-center mt-1">
                <p>{{$report->report_category->name}}</p>
            </div>
            <div class="text-start">
                <h4 class="dark-purple text-start">{{$report->content}}</h4>
            </div>
            <div class="text-end mb-2">
                <span class="purple-gray">Reporter user ID: {{$report->user_id}}</span>
                <span class="ms-3 purple-gray">{{$report->created_at->format('m/d/Y H:i:s')}}</span>
            </div>
        </div>
        @empty
        {{-- if there is no reports --}}
        <div class="py-4 w-85 mx-auto">
            <h2 class="second-title text-center">There is no reports yet.</h2>
        </div>
        @endforelse
    </div>
</div>
@endsection
