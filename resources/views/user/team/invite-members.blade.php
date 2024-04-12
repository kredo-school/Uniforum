@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Invite Members</h1>
    <div class="text-center mt-5 w-85 mx-auto">

        @include('user.team.component.invite.head')

        <div class="">
            <h2 class="second-title text-start mb-4">Enroll Request</h2>
            <div class="row mb-4">
                <a href="" class="text-decoration-none col-auto">
                    <div class="text-start">
                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                    </div>
                </a>
                <a href="" class="text-decoration-none col my-auto">
                    <div class="text-start ms-auto">
                        <p class="fs-5 m-0 thick-gray">David</p>
                    </div>
                </a>
                <div class="col-4 my-auto text-end">
                    <div class="row my-auto">
                        <div class="col-6 text-end">
                            <form action="">
                                @csrf
                                <button type="submit" class="d-block cancel py-1 w-100"><i class="fa-solid fa-xmark"></i> decline</button>
                            </form>
                        </div>
                        <div class="col-6 text-start">
                            <form action="">
                                @csrf
                                <button type="submit" class="d-block execute py-1 w-100"><i class="fa-solid fa-check"></i> accept</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <a href="" class="text-decoration-none col-auto">
                    <div class="text-start">
                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                    </div>
                </a>
                <a href="" class="text-decoration-none col my-auto">
                    <div class="text-start ms-auto">
                        <p class="fs-5 m-0 thick-gray">Ash</p>
                    </div>
                </a>
                {{-- <div class="col-auto text-end my-auto">
                    <p class="fs-5 m-0 dark-purple">Owner</p>
                </div> --}}
                <div class="col-4 my-auto text-end">
                    <div class="row my-auto">
                        <div class="col-6 text-end">
                            <form action="">
                                @csrf
                                <button type="submit" class="d-block cancel py-1 w-100"><i class="fa-solid fa-xmark"></i> decline</button>
                            </form>
                        </div>
                        <div class="col-6 text-start">
                            <form action="">
                                @csrf
                                <button type="submit" class="d-block execute py-1 w-100"><i class="fa-solid fa-check"></i> accept</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
