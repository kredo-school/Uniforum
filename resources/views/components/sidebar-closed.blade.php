<div class='h-100 bg-light-purple'>
    <nav>
        <ul class='list-unstyled text-center py-3'>
            {{-- <button class='btn btn-none text-white mb-4' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasExample' aria-controls='offcanvasExample'>
                <i class='fa-solid fa-bars fs-2'></i>
            </button> --}}
            <button type='button' class='mb-4 btn btn-none' id='menu-btn'>
                <i class='fa-solid fa-bars fs-2 text-white'></i>
            </button>
            <li class='mb-3 py-2 {{ request()->is('home') ? 'active' : '' }}'>
                <a href='{{route('home')}}' class='text-white' data-toggle="tooltip" data-placement="right" title="Home"><i class='fa-solid fa-house fs-2'></i></a>
            </li>
            <li class='mb-3 py-2 {{ request()->is('profile*') ? 'active' : '' }}'>
                <a href='{{route('profile')}}' class='text-white' data-toggle="tooltip" data-placement="right" title="Profile"><i class='fa-solid fa-user fs-2'></i></a>
            </li>
            <li class='mb-3 py-2 {{ request()->is('team*') ? 'active' : '' }}'>
                <a href='{{route('team')}}' class='text-white' data-toggle="tooltip" data-placement="right" title="Team"><i class='fa-solid fa-people-roof fs-2'></i></a>
            </li>
            <li class='mb-3 py-2 {{ request()->is('setting*') ? 'active' : '' }}'>
                <a href='{{route('setting')}}' class='text-white' data-toggle="tooltip" data-placement="right" title="Setting"><i class='fa-solid fa-gear fs-2'></i></a>
            </li>
            <li class='mb-3 py-2'>
                <a href='' class='text-white' data-toggle="tooltip" data-placement="right" title="Logout" data-bs-toggle="modal" data-bs-target="#logout"><i class='fa-solid fa-arrow-right-from-bracket fs-2'></i></a>
            </li>
            {{-- super admin --}}
            <li class='mb-3 py-2 {{ request()->is('super-admin*') ? 'active' : '' }}'>
                <a href='{{route('super-admin')}}' class='text-white' data-toggle="tooltip" data-placement="right" title="Logout"><i class="fa-solid fa-user-gear fs-2"></i></a>
            </li>
        </ul>
    </nav>
</div>

{{-- logout modal --}}
