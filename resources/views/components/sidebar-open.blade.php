<div class='h-100 bg-light-purple' id="sidebar-open">
    <div class="w-100 mx-auto">
        <nav>
            <ul class='list-unstyled py-4'>
                <div class="row mb-4 mt-4">
                    <div class="row w-90 mx-auto">
                        <div class="col d-flex align-items-center">
                            <h3 class="m-0 text-white">MENU</h3>
                        </div>
                        <div class="col text-end my-auto">
                            <button type='button' class='btn btn-none' id='close-btn'>
                                <i class='fa-solid fa-bars fs-2 text-white'></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="">
                    <li class='mb-2'>
                        <a href='{{route('home')}}' class='dark-purple text-decoration-none'>
                            <div class="{{ request()->is('home') ? 'open-active' : '' }} py-2">
                                <div class="w-85 mx-auto row">
                                    <div class="col-4 text-end">
                                        <i class='fa-solid fa-house fs-2'></i>
                                    </div>
                                    <div class="col text-start">
                                        <p class="fs-5 m-0">HOME</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class='mb-2'>
                        <a href='{{route('profile')}}' class='dark-purple text-decoration-none'>
                            <div class="{{ request()->is('profile*') ? 'open-active' : '' }} py-2">
                                <div class="row w-85 mx-auto">
                                    <div class="col-4 text-end">
                                        <i class='fa-solid fa-user fs-2 mx-auto'></i>
                                        {{-- <i class="fa-solid fa-user-pen fs-2 mx-auto"></i> --}}
                                    </div>
                                    <div class="col text-start">
                                        <p class="fs-5 m-0">PROFILE</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class='mb-2'>
                        <a href='{{route('team')}}' class='dark-purple text-decoration-none'>
                            <div class="{{ request()->is('team*') ? 'open-active' : '' }} py-2">
                                <div class="row w-85 mx-auto">
                                    <div class="col-4 text-end">
                                        <i class='fa-solid fa-people-roof fs-2'></i>
                                    </div>
                                    <div class="col text-start">
                                        <p class="fs-5 m-0">TEAM</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </div>
                <div class="mt-5 w-85 mx-auto">
                    <h3 class="m-0 text-white">GENERAL</h3>
                </div>
                <div class="mt-4">
                    <li class='mb-2'>
                        <a href='{{route('setting')}}' class='dark-purple text-decoration-none'>
                            <div class="{{ request()->is('setting*') ? 'open-active' : '' }} py-2">
                                <div class="row w-85 mx-auto">
                                    <div class="col-4 text-end">
                                        <i class='fa-solid fa-gear fs-2'></i>
                                    </div>
                                    <div class="col text-start">
                                        <p class="fs-5 m-0">SETTING</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class='mb-2'>
                        <a href='#' class='dark-purple text-decoration-none' data-bs-toggle="modal" data-bs-target="#logout">
                            <div class="">
                                <div class="row w-85 mx-auto">
                                    <div class="col-4 text-end">
                                        <i class='fa-solid fa-arrow-right-from-bracket fs-2'></i>
                                    </div>
                                    <div class="col text-start">
                                        <p class="fs-5 m-0">LOGOUT</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    {{-- super admin --}}
                    <li class='mb-2'>
                        <a href='{{route('super-admin')}}' class='dark-purple text-decoration-none'>
                            <div class="{{ request()->is('super-admin*') ? 'open-active' : '' }} py-2">
                                <div class="row w-85 mx-auto">
                                    <div class="col-4 text-end">
                                        <i class="fa-solid fa-user-gear fs-2"></i>
                                    </div>
                                    <div class="col text-start">
                                        <p class="fs-5 m-0">ADMIN</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </div>
            </ul>
        </nav>
    </div>
</div>

{{-- Logout Popup --}}
