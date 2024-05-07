<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Palanquin+Dark:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js.file/paginathing.min.js"></script>

</head>
<body style="min-height: 100vh" class="vw-100">
    <div id="app" class="h-100">
        {{-- navbar before login --}}
        @guest
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm vh-10">
            <div class="container">
                <a class="navbar-brand fs-3" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#customer-support-before"><i class="fa-regular fa-circle-question fs-4"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="{{route('customer-support')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="customer-support-before" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                                <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Customer Support</h3>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="mb-2">
                                        <input id="" type="text" class="create-q-input px-2 py-1" placeholder="Enter your email address" name="cs_email">
                                        @error('cs_email')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#customer-support-before').modal('show');
                                                });
                                            </script>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <input id="" type="text" class="create-q-input px-2 py-1" placeholder="Title" name="cs_title">
                                        @error('cs_title')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#customer-support-before').modal('show');
                                                });
                                            </script>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <textarea name="cs_content" id="" rows="10" class="w-80 big-textarea px-3 py-2" placeholder="Please describe your problem as detailed as possible." name="cs_content"></textarea>
                                        @error('cs_content')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#customer-support-before').modal('show');
                                                });
                                            </script>
                                        @enderror
                                    </div>
                                    <div class="w-80 mx-auto">
                                        <input type="file" class="form-control" name="cs_image">
                                        <div class="text-end">
                                            <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                                        </div>
                                        @error('cs_image')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#customer-support-before').modal('show');
                                                });
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pb-3">
                                <div class="w-80 mx-auto row">
                                    <div class="col text-end">
                                        <button type="button" class="create-q-cancel py-1 w-100" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="create-q-post-btn w-100 py-1">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </nav>
        @else
        {{-- navbar after login --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm vh-10">
            <div class="container">
                <a class="navbar-brand fs-3" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item d-flex align-items-center me-2">
                            <p class="nav-link d-flex align-items-center dark-purple m-0 fs-5">{{Auth::user()->university->name}}</p>
                        </li>
                        <li class="nav-item d-flex align-items-center me-2">
                            <a class="nav-link d-flex align-items-center" href="{{route('profile.view', Auth::user()->id)}}">
                                <i class="fa-solid fa-circle-user icon-x-sm text-secondary"></i>
                                <p class="fs-5 m-0 thick-gray ms-2">{{Auth::user()->username}}</p>
                                {{-- <div class="row">
                                    <div class="col text-center">
                                        <i class="fa-solid fa-circle-user fs-4 text-secondary"></i>
                                    </div>
                                    <div class="col ms-auto d-flex align-items-center">
                                        <p class="fs-5 m-0 thick-gray">Yukari</p>
                                    </div>
                                </div> --}}
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center me-2">
                            <a class="nav-link d-flex align-items-center" href=""><i class="fa-solid fa-bell fs-4"></i></a>
                        </li>
                        <li class="nav-item d-flex align-items-center me-3">
                            <a class="nav-link d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#customer-support-after"><i class="fa-regular fa-circle-question fs-4"></i></a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <button type="button" class="ask-question-btn py-1 px-3" data-bs-toggle="modal" data-bs-target="#ask-question-modal"><i class="fa-solid fa-pen-to-square"></i> Ask Question</button>
                        </li>
                    </ul>
                </div>

                {{-- CS After Login --}}
                <form action="{{route('customer-support')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade" id="customer-support-after" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                                    <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Customer Support</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <input id="" type="hidden" class="create-q-input px-2 py-1" name="cs_email" value="{{Auth::user()->email}}">
                                        <div class="mb-2">
                                            <input id="" type="text" class="create-q-input px-2 py-1" placeholder="Title" name="cs_title">
                                            @error('cs_title')
                                                <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                <script type="text/javascript">
                                                    $( document ).ready(function() {
                                                         $('#customer-support-after').modal('show');
                                                    });
                                                </script>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <textarea name="cs_content" id="" rows="10" class="w-80 big-textarea px-3 py-2" placeholder="Please describe your problem as detailed as possible." name="cs_content"></textarea>
                                            @error('cs_content')
                                                <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                <script type="text/javascript">
                                                    $( document ).ready(function() {
                                                         $('#customer-support-after').modal('show');
                                                    });
                                                </script>
                                            @enderror
                                        </div>
                                        <div class="w-80 mx-auto">
                                            <input type="file" class="form-control" name="cs_image">
                                            <div class="text-end">
                                                <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                                            </div>
                                            @error('cs_image')
                                                <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                <script type="text/javascript">
                                                    $( document ).ready(function() {
                                                         $('#customer-support-after').modal('show');
                                                    });
                                                </script>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0 pb-3">
                                    <div class="w-80 mx-auto row">
                                        <div class="col text-end">
                                            <button type="button" class="create-q-cancel py-1 w-100" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="create-q-post-btn w-100 py-1">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                {{-- Ask Question Popup --}}
                <form action="{{ route('question.store')}}" method="POST" enctype="multipart/form-data" id="post-question-form">
                    @csrf
                    <div class="modal fade" id="ask-question-modal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                                <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Ask Question</h3>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="mb-2">
                                        <select class="create-q-select px-1" name="team">
                                            <option disabled selected>To where</option>
                                            <option value="0">general</option>

                                            @foreach (Auth::user()->user_team as $team)
                                            @if (!in_array($team->team_id, $deleted_teams))
                                            <option value="{{$team->team->id}}">{{$team->team->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('team')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#ask-question-modal').modal('show');
                                                });
                                            </script>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <input id="title" type="text" class="create-q-input px-2 py-1" placeholder="Title" name="title" value="{{ old('title') }}">

                                        @error('title')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#ask-question-modal').modal('show');
                                                });
                                            </script>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <select class="create-q-select px-1" name="category">
                                            <option selected disabled>Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('category')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#ask-question-modal').modal('show');
                                                });
                                            </script>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <textarea name="content" id="" rows="5" class="w-80 big-textarea px-2 py-2" placeholder=" Write your question in here!"></textarea>

                                        @error('content')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start m-0" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#ask-question-modal').modal('show');
                                                });
                                            </script>
                                        @enderror
                                    </div>

                                    <div class="w-80 mx-auto">
                                        <input type="file" class="form-control" name="image">
                                        <div class="text-end">
                                            <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                                        </div>
                                    </div>

                                    @error('image')
                                            <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                     $('#ask-question-modal').modal('show');
                                                });
                                            </script>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer border-0 pb-3">
                                <div class="w-80 mx-auto row">
                                    <div class="col text-end">
                                        <button type="button" class="create-q-cancel py-1 w-100" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="create-q-post-btn w-100 py-1" id="post-btn">Post</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </nav>
        @endguest

        <main class="vh-90 vw-100">

            {{-- before login --}}
            @guest
            <div class="vh-90">
                @yield('login-register-content')
            </div>

            @else
            {{-- after login --}}
            <div class="row vh-90 w-100">
                <div class="col-1 vh-90 me-none" id="sidebar-closed">
                    @include('components.sidebar-closed')
                </div>
                <div class="col-2 d-none vh-90 me-none open-animation" id="sidebar-open">
                    @include('components.sidebar-open')
                </div>
                <div class="col-10 vh-90 mx-auto">
                    @yield('content')
                </div>
            </div>
            @endguest
        </main>
        {{-- logout popup --}}
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header w-100 mx-auto ">
                        <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Logout</h3>
                    </div>
                    <form action="{{route('logout-user')}}" method="POST">
                        @csrf
                        <div class="modal-body text-start">
                            <p class="dark-purple">Are you sure you want to logout?</p>
                        </div>
                        <div class="modal-footer pb-3 border-0 pt-3">
                            <div class="w-100 mx-auto row">
                                <div class="col text-start">
                                    <button type="button" class="cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="execute w-50 py-1">Logout</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    $("#menu-btn").click(function(){
        $('#sidebar-closed').addClass('d-none');
        $('#sidebar-open').removeClass("d-none");

        if (typeof(Storage) !== "undefined"){
            localStorage.setItem("sidebar", "opened");
        }

    })
    $("#close-btn").click(function(){
        $('#sidebar-open').addClass('d-none');
        $('#sidebar-open').addClass("open-animation");
        $('#sidebar-closed').removeClass("d-none");

        if (typeof(Storage) !== "undefined"){
            // Save the state of the sidebar as "open"
            localStorage.setItem("sidebar", "closed");
        }
    })

    if (typeof(Storage) !== "undefined") {
        // If we need to open the bar
        if(localStorage.getItem("sidebar") == "opened"){
            // Open the bar
            $('#sidebar-closed').addClass('d-none');
            $('#sidebar-open').removeClass("d-none");
            $('#sidebar-open').removeClass("open-animation");
        }
    }
</script>
{{-- @if (count($errors) > 0)
<script>
    $('#ask-question-modal').modal('show');

</script>
@endif --}}
</html>
