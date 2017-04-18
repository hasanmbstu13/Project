<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        @if(Sentinel::getUser()->inRole('super-user'))
            <li @if(Request::is('users'))class="active"@endif>
                <a href="{!! route('users.index') !!}">Users</span></a>
            </li>
        @endif
        <li @if(Request::is('projects'))class="active"@endif ><a href="{!! route('projects.index') !!}">Projects</a></li>
        {{-- <li><a href="{{ route('projectsWorking') }}">Working</a></li> --}}
        <li><a href="{!! route('projectsArchieve') !!}">Archived</a></li>
        <!-- <li><a href="#">Analytics</a></li> -->
        <!-- <li><a href="#">Export</a></li> -->
    </ul>
</div>