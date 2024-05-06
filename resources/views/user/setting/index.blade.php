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
                <h4 class="thick-gray">Change Email</h4>
            </div>
            <div class="row w-25 ms-auto mt-3">
                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#changeEmailModal">
                    <p class="m-0 text-center execute py-1">Change</p>
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
                    <form action="{{route('setting.change-password')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <p class="dark-purple">*You will be redirected to login page after changing your password.</p>
                            <div class="text-center mt-4">
                                <div class="mb-4">
                                    <input id="oldpass" type="password" class="create-q-input px-2 py-1" placeholder="Enter Old Password" name="old_password" value="">
                                    @error('old_password')
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $('#changePasswordModal').modal('show');
                                        });
                                    </script>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input id="newpass" type="password" class="create-q-input px-2 py-1" placeholder="Enter New Password" name="new_password">
                                    @error('new_password')
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $('#changePasswordModal').modal('show');
                                        });
                                    </script>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input id="confirmpass" type="password" class="create-q-input px-2 py-1" placeholder="Confirm New Password" name="confirm_password">
                                    @error('confirm_password')
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $('#changePasswordModal').modal('show');
                                        });
                                    </script>
                                    @enderror
                                    @if(session('warning_password'))
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start mt-2" role="alert">
                                        <strong>{{ session('warning_password') }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $('#changePasswordModal').modal('show');
                                        });
                                    </script>
                                    @endif
                                </div>
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

        {{-- change email modal --}}
        <div class="modal fade" id="changeEmailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header w-100 mx-auto ">
                        <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Change Password</h3>
                    </div>
                    <form action="{{route('setting.change-email')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <p class="dark-purple">*You will be redirected to login page after changing your email.</p>
                            <div class="text-center mt-4">
                                <div class="mb-4">
                                    <input type="email" class="create-q-input px-2 py-1" placeholder="Enter New Email" name="new_email">
                                    @error('new_email')
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $('#changeEmailModal').modal('show');
                                        });
                                    </script>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input type="email" class="create-q-input px-2 py-1" placeholder="Confirm New Email" name="confirm_email">
                                    @error('confirm_email')
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $('#changeEmailModal').modal('show');
                                        });
                                    </script>
                                    @enderror
                                    @if(session('warning_email'))
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start mt-2" role="alert">
                                        <strong>{{ session('warning_email') }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $('#changeEmailModal').modal('show');
                                        });
                                    </script>
                                    @endif
                                </div>
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
                    <form action="{{route('setting.change-university')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <p class="dark-purple">*You will be redirected to home page after changing your university/college.</p>
                            <div class="text-center mt-4">
                                <div class="">
                                    <select class="create-q-select px-1 mb-2" name="new_uni">
                                        <option selected disabled>Choose Your New University/College</option>
                                        @foreach ($universities as $university)
                                        <option value="{{$university->id}}"
                                            @if ($university->id == Auth::user()->uni_id)
                                            selected
                                            @endif
                                            >{{$university->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('new_uni')
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $('#changeUnilModal').modal('show');
                                        });
                                    </script>
                                    @enderror
                                </div>

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
        <form action="{{route('setting.delete-account')}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header w-100 mx-auto ">
                            <h3 class="modal-title red" id="exampleModalLongTitle">Delete Account</h3>
                        </div>
                        <div class="modal-body">
                            {{-- <p class="mid-gray fs-6">*To delete your account, please type your password.</p> --}}
                            <div class="mx-auto mt-3 text-center">
                                <input type="password" class="create-q-input px-2 py-1" placeholder="Enter password to do this action" name="password" value="">
                                @error('password')
                                <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                <script type="text/javascript">
                                    $( document ).ready(function() {
                                         $('#deleteAccountModal').modal('show');
                                    });
                                </script>
                                @enderror
                                @if(session('warning_delete'))
                                <div class="w-80 mx-auto uni-invalid-feedback text-start mt-2" role="alert">
                                    <strong>{{ session('warning_delete') }}</strong>
                                </div>
                                <script type="text/javascript">
                                    $( document ).ready(function() {
                                         $('#deleteAccountModal').modal('show');
                                    });
                                </script>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer pb-3 border-0 pt-3">
                            <div class="w-100 mx-auto row">
                                <div class="col text-start">
                                    <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col text-end">
                                    <button type="button" class="delete-team-post-btn w-50 py-1" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header w-100 mx-auto ">
                            <h3 class="modal-title red" id="exampleModalLongTitle">Delete Account</h3>
                        </div>
                        <div class="modal-body text-start">
                            <p class="red fs-5">Are you sure you want to delete this account?</p>
                            <p class="mid-gray fs-6 px-1">*You cannot login to this account after you have done this action.</p>
                        </div>
                        <div class="modal-footer pb-3 border-0 pt-3">
                            <div class="w-100 mx-auto row">
                                <div class="col text-start">
                                    <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="delete-team-post-btn w-50 py-1">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
