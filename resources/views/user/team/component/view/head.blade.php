<h1 class="dark-purple">Team Detail</h1>
    <div class="mt-4 w-85 mx-auto">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-8 text-center">
                <div>
                    <i class="fa-solid fa-square icon-semi-lg mid-gray"></i>
                </div>
                <div class="mt-3">
                    <h1 class="thick-gray">Kredo Baseball Team</h1>
                </div>
                <div class="row mt- dark-purple">
                    <div class="col text-end">
                        <p class="">public team</p>
                        {{-- <p class="">private team</p> --}}
                    </div>
                    <div class="col text-start">
                        <i class="fa-solid fa-user"></i> 50 members
                    </div>
                </div>
                <div class="mt-3 mid-gray">
                    <p>Kredo university baseball team. You can join this team whether you are a member of KBT or not.</p>
                </div>
            </div>
            <div class="col">
                {{-- after join --}}
                <div class="dropstart text-end">
                    <button type="button" class="btn btn-none" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical fs-4"></i></button>
                    <div class="dropdown-menu text-center">
                        <a href="" class="dropdown-item red" data-bs-toggle="modal" data-bs-target="#leave-team-">
                            <i class="fa-solid fa-person-walking-arrow-right"></i> leave
                        </a>
                        <hr class="dropdown-divider">
                        <a href="{{route('team.setting')}}" class="dropdown-item thick-gray">
                            <i class="fa-solid fa-users-gear"></i> setting
                        </a>
                        <hr class="dropdown-divider">
                        <a href="" class="dropdown-item thick-gray" data-bs-toggle="modal" data-bs-target="#report-team-">
                            <i class="fa-regular fa-flag"></i> report
                        </a>
                    </div>

                </div>

            </div>
        </div>

        {{-- before join --}}
        <div class="mt-4">
            <div class="row">
                {{-- public team --}}
                <form action="" class="text-center">
                    <button type="submit" class="execute py-1 w-25 mx-auto">join</button>
                </form>
                {{-- private team --}}
                {{-- <form action="" class="text-center">
                    <button type="submit" class="apply-btn py-1 w-25 mx-auto">Apply to Join</button>
                </form> --}}
            </div>
            <div class="row mt-2">
                <button type="button" class="btn btn-none purple-gray" data-bs-toggle="modal" data-bs-target="#report-team-"><i class="fa-regular fa-flag"></i> Report this team</button>
            </div>
        </div>

        {{-- after apply to private team--}}
        {{-- <div class="mt-4">
            <div class="row">
                <form action="" class="text-center">
                    <button type="submit" class="cancel py-1 w-25 mx-auto">Applied</button>
                </form>
            </div>
            <div class="row mt-2">
                <button type="button" class="btn btn-none purple-gray" data-bs-toggle="modal" data-bs-target="#report-team-"><i class="fa-regular fa-flag"></i> Report this team</button>
            </div>
        </div> --}}

        <div class="modal fade" id="report-team-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                        <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Report Team</h3>
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



        {{-- leave team popup --}}
        <div class="modal fade" id="leave-team-" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header w-100 mx-auto ">
                  <h3 class="modal-title red" id="exampleModalLongTitle">Leave Team</h3>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body text-start">
                        <p class="red">Are you sure you want to leave from this team?</p>
                      </div>
                      <div class="modal-footer pb-3 border-0 pt-3">
                          <div class="w-100 mx-auto row">
                              <div class="col text-start">
                                  <button type="button" class="delete-team-cancel py-1 w-50" data-bs-dismiss="modal">Cancel</button>
                              </div>
                              <div class="col text-end">
                                  <button type="submit" class="delete-team-post-btn w-50 py-1">Leave</button>
                              </div>
                          </div>
                      </div>
                </form>
            </div>
        </div>


    </div>
