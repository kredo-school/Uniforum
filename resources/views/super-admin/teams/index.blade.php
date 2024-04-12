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
                        <th></th>
                        <th>NAME</th>
                        <th>OWNER</th>
                        <th>MEMBER</th>
                        <th>CREATED AT</th>
                        <th>REPORT</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="w-100">
                        <tr class="">
                            <td>1</td>
                            <td class="text-center">
                                <i class="fa-solid fa-square icon-sm text-secondary"></i>
                            </td>
                            <td class="">
                                Kredo Baseball Team
                            </td>
                            <td class="">Kredo Taro</td>
                            <td class="">50</td>
                            <td class="">2024/4/5</td>
                            <td>0</td>
                            <td class="">
                                {{-- <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Not Active --}}
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Active
                            </td>
                            <td class="">
                                {{-- if the user is deactivated --}}
                                {{-- <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#activate-team-">
                                            <i class="fa-solid fa-people-roof"></i> Activate team
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="activate-team-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Activate Team</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to activate this team?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Activate</button>
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
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-team-">
                                            <i class="fa-solid fa-users-rays"></i> Deactivate team
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('team.view')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.teams.report')}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- hide question popup --}}
                                <div class="modal fade" id="deactivate-team-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Deactivate Team</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to deactivate this team?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="">
                                                            @csrf
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Deactivate</button>
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
