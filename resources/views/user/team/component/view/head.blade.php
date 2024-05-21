<h1 class="dark-purple">Team Detail</h1>
    <div class="mt-4 w-85 mx-auto">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-8 text-center">
                <div>
                    @if ($detail->icon)
                    <img src="{{$detail->icon}}" alt="" class="avatar-semi-lg rounded mb-2">
                    @else
                    <i class="fa-solid fa-square icon-semi-lg mid-gray"></i>
                    @endif
                </div>
                <div class="mt-3">
                    <h1 class="thick-gray">{{$detail->name}}</h1>
                </div>
                <div class="row mt- dark-purple">
                    <div class="col text-end">
                        @if ($detail->type == '2')
                        <p class="">private team</p>
                        @else
                        <p class="">public team</p>
                        @endif
                    </div>
                    <div class="col text-start">
                        <i class="fa-solid fa-user"></i> {{$detail->user_team->count()}} members
                    </div>
                </div>
                <div class="mt-3 mid-gray">
                    <p>{{$detail->description}}</p>
                </div>
            </div>
            <div class="col">
                @if ($detail->membered())
                <div class="dropstart text-end">
                    <button type="button" class="btn btn-none" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical fs-4"></i></button>
                    <div class="dropdown-menu text-center">
                        {{-- if owner --}}
                        @if ($detail->isTeamOwner())
                        <a href="{{route('team.setting', $detail)}}" class="dropdown-item thick-gray">
                            <i class="fa-solid fa-users-gear"></i> setting
                        </a>
                        <hr class="dropdown-divider">
                        <a href="" class="dropdown-item thick-gray" data-bs-toggle="modal" data-bs-target="#report-team-{{$detail->id}}">
                            <i class="fa-regular fa-flag"></i> report
                        </a>
                        {{-- if admin --}}
                        @elseif($detail->isTeamAdmin())
                        <a href="" class="dropdown-item red" data-bs-toggle="modal" data-bs-target="#leave-team-model">
                            <i class="fa-solid fa-person-walking-arrow-right"></i> leave
                        </a>
                        <hr class="dropdown-divider">
                        <a href="{{route('team.setting', $detail)}}" class="dropdown-item thick-gray">
                            <i class="fa-solid fa-users-gear"></i> setting
                        </a>
                        <hr class="dropdown-divider">
                        <a href="" class="dropdown-item thick-gray" data-bs-toggle="modal" data-bs-target="#report-team-{{$detail->id}}">
                            <i class="fa-regular fa-flag"></i> report
                        </a>
                        @else
                        {{-- if member --}}
                        <a href="" class="dropdown-item red" data-bs-toggle="modal" data-bs-target="#leave-team-model">
                            <i class="fa-solid fa-person-walking-arrow-right"></i> leave
                        </a>
                        <hr class="dropdown-divider">
                        <a href="" class="dropdown-item thick-gray" data-bs-toggle="modal" data-bs-target="#report-team-{{$detail->id}}">
                            <i class="fa-regular fa-flag"></i> report
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- if you are admin, no buttons --}}
        @if (Auth::user()->role_id != 2)
        @else
        {{-- before join --}}
        {{-- if you are invited by this team --}}
        @if($detail->invited())
        <div class="mt-4">
            <div class="row">
                <form action="{{route('team.acceptInvite')}}" class="text-center" method="POST">
                    @csrf
                    <input type="hidden" name="team_id" value="{{$detail->id}}">
                    <button type="submit" class="execute py-1 w-25 mx-auto">Accept</button>
                </form>
            </div>
            <div class="row mt-2">
                <button type="button" class="btn btn-none purple-gray" data-bs-toggle="modal" data-bs-target="#report-team-{{$detail->id}}"><i class="fa-regular fa-flag"></i> Report this team</button>
            </div>
        </div>

        {{-- if you are not invited, neighther a member or applied for this team --}}
        @elseif (!$detail->membered() && !$detail->applied())
        <div class="mt-4">
            <div class="row">
                @if ($detail->type == 2)
                {{-- private team --}}
                <form action="{{route('team.apply')}}" class="text-center" method="POST">
                    @csrf
                    <input type="hidden" name="team_id" value="{{$detail->id}}">
                    <button type="submit" class="apply-btn py-1 w-25 mx-auto">Apply to Join</button>
                </form>
                @else
                {{-- public team --}}
                <form action="{{route('team.join')}}" class="text-center" method="POST">
                    @csrf
                    <input type="hidden" name="team_id" value="{{$detail->id}}">
                    <button type="submit" class="execute py-1 w-25 mx-auto">Join</button>
                </form>
                @endif
            </div>
            <div class="row mt-2">
                <button type="button" class="btn btn-none purple-gray" data-bs-toggle="modal" data-bs-target="#report-team-{{$detail->id}}"><i class="fa-regular fa-flag"></i> Report this team</button>
            </div>
        </div>

        {{-- if you are not invited, not member, but applied for this team --}}
        @elseif(!$detail->membered() && $detail->applied())
        {{-- after apply to private team--}}
        <div class="mt-4">
            <div class="row">
                <form action="" class="text-center">
                    <button type="submit" class="cancel py-1 w-25 mx-auto">Applied</button>
                </form>
            </div>
            <div class="row mt-2">
                <button type="button" class="btn btn-none purple-gray" data-bs-toggle="modal" data-bs-target="#report-team-{{$detail->id}}"><i class="fa-regular fa-flag"></i> Report this team</button>
            </div>
        </div>
        @endif
        @endif

        {{-- report team popup --}}
        <form action="{{route('team.report.store', $detail->id)}}" method="POST">
            @csrf
            <div class="modal fade" id="report-team-{{$detail->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                            <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Report Team</h3>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="mb-3">
                                    <select class="create-q-select px-1" name="t_report_category">
                                        <option disabled selected>Category of Problem</option>
                                        @foreach ($report_categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('t_report_category')
                                    <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                             $("#report-team-{{$detail->id}}").modal('show');
                                        });
                                    </script>
                                    @enderror
                                </div>
                                <textarea name="t_report_content" id="" rows="10" class="w-80 big-textarea px-3 py-2" placeholder="Please write the reason of reporting this team as detailed as possible.">{{ old('t_report_content') }}</textarea>
                                @error('t_report_content')
                                <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                <script type="text/javascript">
                                    $( document ).ready(function() {
                                         $("#report-team-{{$detail->id}}").modal('show');
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
                                    <button type="submit" class="create-q-post-btn w-100 py-1">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- leave team popup --}}
        <div class="modal fade" id="leave-team-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header w-100 mx-auto ">
                  <h3 class="modal-title red" id="exampleModalLongTitle">Leave Team</h3>
                </div>
                <form action="{{route('team.leave')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$detail->id}}" name="team_id">
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
