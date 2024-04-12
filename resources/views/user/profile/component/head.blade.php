<div class="w-85 mx-auto mt-4">
    {{-- user detail part --}}
    <div class="row">
        <div class="col-2 text-end">
            <i class="fa-solid fa-circle-user icon-md text-secondary"></i>
        </div>
        <div class="col ms-auto d-flex align-items-center">
            <div>
                <div class="text-bottom">
                    <h1 class="m-0 display-5 thick-gray">Yukari</h1>
                </div>
                <div class="mt-1">
                    <p class="mid-gray fs-6">Kredo University 3rd grade. Nice to meet you.</p>
                </div>
            </div>
        </div>
        <div class="col-auto text-end  my-auto">
            {{-- if owner --}}
            <a href="{{route('profile.edit')}}" class="btn light-purple-btn">Edit Profile</a>
            {{-- if others --}}
            {{-- <button type="button" class="btn btn-none purple-gray" data-bs-toggle="modal" data-bs-target="#report-user-"><i class="fa-regular fa-flag"></i> Report this user</button> --}}
        </div>
    </div>
    {{-- report user popup --}}
    <div class="modal fade" id="report-user-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                    <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Report User</h3>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="text-center">
                            <select class="create-q-select px-1 mb-3">
                                <option selected>Category of Problem</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <textarea name="" id="" rows="10" class="w-80 big-textarea px-3 py-2" placeholder="Please write the reason of reporting this team as detailed as possible."></textarea>
                        </div>
                    </form>
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
</div>
