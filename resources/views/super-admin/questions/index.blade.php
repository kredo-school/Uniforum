@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Admin</h1>
    {{-- for super admin page, the content inside should be wider than other pages --}}
    {{-- <div class="mt-4 w-100">  ←  <div class="mt-4 w-80 mx-auto"> --}}
    <div class="mt-4 w-100">
        <div class="row">
            <div class="col-3">
                @include('super-admin.users.content.menu')
            </div>
            <div class="col-9">
                <table class="table table-hover align-middle bg-white border w-100">
                    <thead class="w-100">
                      <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <th>OWNER</th>
                        <th>CREATED AT</th>
                        <th>REPORT</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="w-100">
                        <tr class="">
                            <td>1</td>
                            <td class="">
                                How can I join Kredo Soccer Team?
                            </td>
                            <td class="">event</td>
                            <td class="">Yukari</td>
                            <td class="">2024/4/5</td>
                            <td>0</td>
                            <td class="">
                                {{-- <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Not Active --}}
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Visible
                            </td>
                            <td class="">
                                {{-- if the user is deactivated --}}
                                {{-- <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#show-question-">
                                            <i class="fa-solid fa-user"></i> Activate pen
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="show-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Show Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to show this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Show</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 --}}

                                {{-- if the question is active --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-question-">
                                            <i class="fa-solid fa-eye-slash"></i> Hide
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('view')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.questions.report')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- hide question popup --}}
                                <div class="modal fade" id="hide-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Hide Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to hide this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Hide</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="">
                            <td>2</td>
                            <td class="">
                                How can I join Kredo Soccer Team?
                            </td>
                            <td class="">event</td>
                            <td class="">Yukari</td>
                            <td class="">2024/4/5</td>
                            <td>0</td>
                            <td class="">
                                {{-- <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Not Active --}}
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Visible
                            </td>
                            <td class="">
                                {{-- if the user is deactivated --}}
                                {{-- <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#show-question-">
                                            <i class="fa-solid fa-user"></i> Activate pen
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="show-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Show Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to show this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Show</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 --}}

                                {{-- if the user is active --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-question-">
                                            <i class="fa-solid fa-eye-slash"></i> Hide
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('view')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.questions.report')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- hide question popup --}}
                                <div class="modal fade" id="hide-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Hide Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to hide this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Hide</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="">
                            <td>3</td>
                            <td class="">
                                How can I join Kredo Soccer Team?
                            </td>
                            <td class="">event</td>
                            <td class="">Yukari</td>
                            <td class="">2024/4/5</td>
                            <td>0</td>
                            <td class="">
                                {{-- <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Not Active --}}
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Visible
                            </td>
                            <td class="">
                                {{-- if the user is deactivated --}}
                                {{-- <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#show-question-">
                                            <i class="fa-solid fa-user"></i> Activate pen
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="show-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Show Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to show this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Show</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 --}}

                                {{-- if the user is active --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-question-">
                                            <i class="fa-solid fa-eye-slash"></i> Hide
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('view')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.questions.report')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- hide question popup --}}
                                <div class="modal fade" id="hide-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Hide Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to hide this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Hide</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="">
                            <td>4</td>
                            <td class="">
                                How can I join Kredo Soccer Team?
                            </td>
                            <td class="">event</td>
                            <td class="">Yukari</td>
                            <td class="">2024/4/5</td>
                            <td>0</td>
                            <td class="">
                                {{-- <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Not Active --}}
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Visible
                            </td>
                            <td class="">
                                {{-- if the user is deactivated --}}
                                {{-- <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#show-question-">
                                            <i class="fa-solid fa-user"></i> Activate pen
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="show-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Show Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to show this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Show</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 --}}

                                {{-- if the user is active --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-question-">
                                            <i class="fa-solid fa-eye-slash"></i> Hide
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('view')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.questions.report')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- hide question popup --}}
                                <div class="modal fade" id="hide-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Hide Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to hide this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Hide</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="">
                            <td>5</td>
                            <td class="">
                                How can I join Kredo Soccer Team?
                            </td>
                            <td class="">event</td>
                            <td class="">Yukari</td>
                            <td class="">2024/4/5</td>
                            <td>0</td>
                            <td class="">
                                {{-- <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Not Active --}}
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Visible
                            </td>
                            <td class="">
                                {{-- if the user is deactivated --}}
                                {{-- <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#show-question-">
                                            <i class="fa-solid fa-user"></i> Activate pen
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="show-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Show Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to show this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Show</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 --}}

                                {{-- if the user is active --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-question-">
                                            <i class="fa-solid fa-eye-slash"></i> Hide
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('view')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.questions.report')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- hide question popup --}}
                                <div class="modal fade" id="hide-question-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Hide Question</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to hide this question?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Hide</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
