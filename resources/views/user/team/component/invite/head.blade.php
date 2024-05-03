<div class="row mb-5">
    <div class="search-bar p-1">
        <form action="{{route('team.invite-members.search', $team)}}" method="GET">
            @csrf
            <div class="row">
                <div class="col-1 my-auto">
                    <button type="submit" class="btn btn-none"><i class="fa-solid fa-magnifying-glass fs-4"></i></button>
                </div>
                <div class="col text-start">
                    <input type="search" placeholder="search for user" class="no-border w-100 bg-light-gray h-100 search-input" name="user_keyword">
                </div>
            </div>
        </form>
    </div>
</div>
