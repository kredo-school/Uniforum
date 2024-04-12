@extends('layouts.app')

@section('content')
<div class="container py-5 px-5">
    <h1 class="dark-purple">Edit Profile</h1>
    <div class="text-center mt-4 w-85 mx-auto">
        <form action="" method="POST">
            @csrf
            @method('')
            <div class="row">
                <div class="col profile-left py-5 px-1">
                    <div class="text-center pt-4 pb-2">
                        <i class="fa-solid fa-circle-user icon-lg text-secondary"></i>
                    </div>
                    <div class="w-85 mx-auto mt-5">
                        <input type="file" id="avatar" class="form-control">
                        <div class="">
                            <label for="" class="form-text purple-gray x-small">Accepted file types: jpg, jpeg, png, gif, Max file size 1048kb.</label>
                        </div>
                    </div>
                </div>
                <div class="col profile-right">
                    <div class="py-5 px-3">
                        <div class="form-group text-start mb-3">
                            <label for="" class="dark-purple">Username</label>
                            <input type="text" class="profile-input d-block w-100 py-1 px-2" value="Yukari">
                        </div>
                        <div class="form-group text-start mb-3">
                            <label for="" class="dark-purple">Email</label>
                            <input type="text" class="profile-input d-block w-100 py-1 px-2" value="kredo@kru.ac.jp">
                        </div>
                        <div class="form-group text-start">
                            <label for="" class="dark-purple">Introduction</label>
                            <textarea name="" id="" rows="5" class="w-100 big-textarea px-2 py-2 mb-2">Kredo Uni 3rd grade. Nice to meet you.</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="col text-end">
                    <button type="button" class="create-q-cancel py-1 w-100" onclick="history.back()">Cancel</button>
                </div>
                <div class="col">
                    {{-- change to modal button --}}
                    <button type="button" class="create-q-post-btn py-1 w-100" data-bs-toggle="modal" data-bs-target="#confirmEditProfile">Edit</button>
                </div>
            </div>

            {{-- Edit Profile Popup --}}
            <div class="modal fade" id="confirmEditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header w-100 mx-auto ">
                      <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Edit Profile</h3>
                      {{-- <button type="button" class="close ms-auto btn btn-none" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <i class="fa-solid fa-xmark"></i>
                      </button> --}}
                    </div>
                    <div class="modal-body text-start">
                        <p>Are you sure you want to edit this profile?</p>
                    </div>
                    <div class="modal-footer pb-3 border-0 pt-3">
                        <div class="w-100 mx-auto row">
                            <div class="col text-start">
                                <button type="button" class="create-q-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col text-end">
                                <button type="submit" class="create-q-post-btn w-50 py-1">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
