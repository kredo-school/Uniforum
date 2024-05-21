@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Admin</h1>
    {{-- for super admin page, the content inside should be wider than other pages --}}
    {{-- <div class="mt-4 w-100">  →  <div class="mt-4 w-80 mx-auto"> --}}
    <div class="mt-4 w-100">
        <div class="row">
            <div class="col-3">
                @include('super-admin.users.content.menu')
            </div>
            <div class="col-9">
                <table class="table table-hover align-middle bg-white border">
                    <thead class="">
                      <tr>
                        <th>ID</th>
                        <th></th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>CREATED AT</th>
                        <th>REPORT</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($all_users as $user)
                        <tr class="">
                            <td>{{$user->id}}</td>
                            <td class="text-center">
                                @if($user->avatar)
                                <img src="{{$user->avatar}}" class="avatar-sm rounded-circle" alt="">
                                @else
                                <i class="fa-solid fa-circle-user icon-sm text-secondary icon-sm"></i>
                                @endif
                            </td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->format('Y/m/d')}}</td>
                            <td>{{$user->user_report->count()}}</td>
                            <td>
                                @if ($user->deleted_at)
                                <i class="fa-solid fa-circle text-secondary"></i> &nbsp;
                                Not Active
                                @else
                                <i class="fa-solid fa-circle text-success"></i> &nbsp;
                                Active
                                @endif
                            </td>
                            <td>
                                {{-- if the user is deactivated --}}
                                @if ($user->deleted_at)
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="" class="dropdown-item dark-purple" data-bs-toggle="modal" data-bs-target="#activate-user-{{$user->id}}">
                                            <i class="fa-solid fa-user"></i> Activate user
                                        </a>
                                    </div>
                                </div>

                                <div class="modal fade" id="activate-user-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Activate {{$user->username}}</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="dark-purple">Are you sure you want to activate this user?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="{{route('super-admin.users.activate', $user->id)}}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="execute w-50 py-1">Activate</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                {{-- if the user is active --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{$user->id}}">
                                            <i class="fa-solid fa-user-slash"></i> Deactivate user
                                        </button>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('profile.view', $user->id)}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-newspaper"></i> Detail
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{route('super-admin.users.report', $user->id)}}" class="dropdown-item thick-gray">
                                            <i class="fa-solid fa-envelope-circle-check"></i> Report Detail
                                        </a>
                                    </div>
                                </div>

                                {{-- deactivate user popup --}}
                                <div class="modal fade" id="deactivate-user-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header w-100 mx-auto ">
                                                <h3 class="modal-title red" id="exampleModalLongTitle">Deactivate User</h3>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="red">Are you sure you want to deactivate this user?</p>
                                            </div>
                                            <div class="modal-footer pb-3 border-0 pt-3">
                                                <div class="w-100 mx-auto row">
                                                    <div class="col text-start">
                                                        <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="{{route('super-admin.users.deactivate', $user->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="delete-team-post-btn w-50 py-1">Deactivate</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr class="py-4 text-center">
                            <h2 class="mid-gray">No Users</h2>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="w-100 mt-4">
                    {{ $all_users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
