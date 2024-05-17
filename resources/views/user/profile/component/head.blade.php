<div class="w-85 mx-auto mt-4">
    {{-- user detail part --}}
    <div class="row">
        <div class="col-2 text-end">
            @if ($detail->avatar)
            <img src="{{$detail->avatar}}" alt="" class="avatar-md rounded-circle">
            @else
            <i class="fa-solid fa-circle-user icon-md text-secondary"></i>
            @endif
        </div>
        <div class="col ms-auto d-flex align-items-center">
            <div>
                <div class="text-bottom">
                    <h1 class="m-0 display-5 thick-gray">{{$detail->username}}</h1>
                </div>
                <div class="mt-1">
                    <p class="mid-gray fs-6">{{$detail->introduction}}</p>
                </div>
            </div>
        </div>
        <div class="col-auto my-auto uni-label">
            <div class="uni-label text-center w-100">
                <p class="dark-purple m-0 fs-5">{{$detail->university->name}}</p>
            </div>
        </div>
        <div class="col-auto text-end  my-auto">
            {{-- if owner --}}
            @if (Auth::user()->id == $detail->id)
            <a href="{{route('profile.edit', $detail)}}" class="btn light-purple-btn">Edit Profile</a>
            @else
            {{-- if others --}}
            <button type="button" class="btn btn-none purple-gray" data-bs-toggle="modal" data-bs-target="#report-user-modal"><i class="fa-regular fa-flag"></i> Report this user</button>
            @endif
        </div>
    </div>
    {{-- report user popup --}}
    <form action="{{route('user.report.store', $detail->id)}}" method="POST">
        @csrf
        <div class="modal fade" id="report-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0 w-80 mx-auto pb-0 pt-3">
                        <h3 class="modal-title dark-purple" id="exampleModalLongTitle">Report User</h3>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="mb-3">
                                <select class="create-q-select px-1" name="user_report_category">
                                    <option disabled selected>Category of Problem</option>
                                    @foreach ($report_categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_report_category')
                                <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                <script type="text/javascript">
                                $( document ).ready(function() {
                                    $("#report-user-modal").modal('show');
                                });
                                </script>
                                @enderror
                            </div>

                            <textarea name="user_report_content" rows="10" class="w-80 big-textarea px-3 py-2" placeholder="Please write the reason of reporting this team as detailed as possible."></textarea>
                            @error('user_report_content')
                                <div class="w-80 mx-auto uni-invalid-feedback text-start" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                <script type="text/javascript">
                                $( document ).ready(function() {
                                    $("#report-user-modal").modal('show');
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
</div>
