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

                <form action="" class="row mb-3">
                    @csrf
                    <div class="col-9 my-auto">
                        <input type="text" class="add-category-input px-2 py-2 w-100" placeholder="Add a category..." name="name">
                    </div>
                    <div class="col-3 my-auto">
                        <button type="submit" class="execute w-100 py-1"><i class="fa-solid fa-plus"></i> Add Category</button>
                    </div>
                </form>

                <table class="table table-hover align-middle bg-white border w-100">
                    <thead class="w-100">
                      <tr>
                        <th>#</th>
                        <th>NAME</th>
                        <th>COUNT</th>
                        <th>LAST UPDATE</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="w-100">
                        <tr class="">
                            <td>1</td>
                            <td>
                                Club
                            </td>
                            <td >
                                1
                            </td>
                            <td>1 mounth ago</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#update-category-" class="cancel">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#delete-category-" class="delete ms-2">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>

                        </tr>
                        {{-- update category modal --}}
                        <div class="modal fade" id="update-category-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header w-100 mx-auto ">
                                        <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Update Category</h3>
                                    </div>
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="modal-body mt-3">
                                            <div class="text-center">
                                                <input id="update-category" type="text" class="create-q-input px-2 py-1" required value="Club">
                                            </div>
                                        </div>
                                        <div class="modal-footer pb-3 border-0 pt-3">
                                            <div class="w-100 mx-auto row">
                                                <div class="col text-start">
                                                    <button type="button" class="cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                                <div class="col text-end">
                                                    <button type="submit" class="execute w-50 py-1">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- delete category popup --}}
                        <div class="modal fade" id="delete-category-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header w-100 mx-auto ">
                                        <h3 class="modal-title red" id="exampleModalLongTitle">Delete Category</h3>
                                    </div>
                                    <div class="modal-body text-start">
                                        <p class="red">Are you sure you want to delete this category?</p>
                                    </div>
                                    <div class="modal-footer pb-3 border-0 pt-3">
                                        <div class="w-100 mx-auto row">
                                            <div class="col text-start">
                                                <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col text-end">
                                                <form action="">
                                                    @csrf
                                                    <button type="submit" class="delete-team-post-btn w-50 py-1">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
