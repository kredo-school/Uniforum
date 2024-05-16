<ul class="list-group">
    <a href="{{route('super-admin')}}" class="list-group-item {{ request()->is('super-admin') ? 'active' : '' }}" aria-current="true">
        <i class="fa-solid fa-users"></i> Users
    </a>
    <a href="{{route('super-admin.questions')}}" class="list-group-item {{ request()->is('super-admin/questions') ? 'active' : '' }}" aria-current="true">
        <i class="fa-solid fa-question"></i> Questions
    </a>
    <a href="{{route('super-admin.answers')}}" class="list-group-item {{ request()->is('super-admin/answers') ? 'active' : '' }}" aria-current="true">
        <i class="fa-solid fa-comments"></i> Answers
    </a>
    <a href="{{route('super-admin.teams')}}" class="list-group-item {{ request()->is('super-admin/teams') ? 'active' : '' }}" aria-current="true">
        <i class="fa-solid fa-people-roof"></i> Teams
    </a>
    <a href="{{route('super-admin.categories')}}" class="list-group-item {{ request()->is('super-admin/categories') ? 'active' : '' }}" aria-current="true">
        <i class="fa-solid fa-tags"></i> Categories
    </a>
    <a href="{{route('super-admin.universities')}}" class="list-group-item {{ request()->is('super-admin/universities') ? 'active' : '' }}" aria-current="true">
        <i class="fa-solid fa-building-columns"></i> Universities
    </a>
</ul>
