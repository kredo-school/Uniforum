@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Setting</h1>
    <div class="text-center mt-5 w-85 mx-auto">
        <div class="row">
            <div class="row text-start">
                <h4 class="thick-gray">Change Password</h4>
            </div>
            <div class="row w-25 ms-auto mt-3">
                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                    {{-- <p class="m-0 text-center execute py-1">Edit</p> --}}
                    <div class="text-center execute py-1">Change</div>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="row text-start">
                <h4 class="thick-gray">Change University/College</h4>
            </div>
            <div class="row w-25 ms-auto mt-3">
                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#changeUniModal">
                    <p class="m-0 text-center execute py-1">Change</p>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="row text-start">
                <h4 class="red">Delete Account</h4>
            </div>
            <div class="row w-25 ms-auto mt-3">
                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    <p class="m-0 text-center delete py-1">Delete</p>
                </a>
            </div>
        </div>
        <hr>

        {{-- change password modal --}}
        <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header w-100 mx-auto ">
                        <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Change Password</h3>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body mt-3">
                            <div class="text-center">
                                <input id="oldpass" type="password" class="create-q-input px-2 mb-4 py-1" required placeholder="Enter Old Password">
                                <input id="newpass" type="password" class="create-q-input px-2 mb-4 py-1" required placeholder="Enter New Password">
                                <input id="confirmpass" type="password" class="create-q-input px-2 mb-4 py-1" required placeholder="Confirm New Password">
                            </div>
                        </div>
                        <div class="modal-footer pb-3 border-0 pt-3">
                            <div class="w-100 mx-auto row">
                                <div class="col text-start">
                                    <button type="button" class="cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="execute w-50 py-1">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- change uni modal --}}
        <div class="modal fade" id="changeUniModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header w-100 mx-auto ">
                        <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Change University/College</h3>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body mt-4">
                            <div class="text-center">
                                <select class="create-q-select px-1 mb-2">
                                    <option selected>Choose Your New University/College</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer pb-3 border-0 pt-4">
                            <div class="w-100 mx-auto row">
                                <div class="col text-start">
                                    <button type="button" class="cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="execute w-50 py-1">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- delete account modal --}}
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header w-100 mx-auto ">
                        <h3 class="modal-title red" id="exampleModalLongTitle">Delete Account</h3>
                    </div>
                    <div class="modal-body text-start">
                        <p class="red fs-5">Are you sure you want to delete this account?</p>
                        <p class="mid-gray fs-6 px-1">You cannot login to this account after you have done this action.</p>
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

    </div>
</div>
@endsection
