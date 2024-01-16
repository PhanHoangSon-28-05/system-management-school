<div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="font-size: 15px;">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard </a></li>
            @can('show-role')
                <li><a href="{{ URL::route('roles.index') }}"><i class="fa fa-flag-o"></i> Roles </a></li>
            @endcan
            <li><a href="{{ URL::route('users.index') }}"><i class="fa fa-user"></i> Users </a></li>
            <li><a href="{{ URL::route('teachers.index') }}"><i class="fa fa-chalkboard-teacher"></i> Teacher </a></li>
            <li><a href="{{ URL::route('students.index') }}"><i class="fa fa-graduation-cap"></i> Student </a></li>
            <li><a href="{{ URL::route('grades.index') }}"><i class="fa fa-chalkboard"></i> Grade </a></li>
            <li><a href="{{ URL::route('departments.index') }}"><i class="fa fa-building"></i> Department </a></li>
            <li><a href="{{ URL::route('subjects.index') }}"><i class="fa fa-book"></i> Subject </a></li>
            <li><a href="{{ URL::route('rooms.index') }}"><i class="fa fa-door-open"></i> Room </a></li>
            <li><a href="{{ URL::route('schedules.index') }}"><i class="fa fa-flag-o"></i> Scheldule </a></li>
            <li><a href="{{ URL::route('scores.index') }}"><i class="fa fa-flag-o"></i> Score </a></li>
            {{-- <li><a href=""><i class="fa fa-graduation-cap"></i> Grades </a></li> --}}
        </ul>
    </div>
</div>
