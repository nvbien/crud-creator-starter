<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('activityLogs*') ? 'active' : '' }}">
    <a href="{!! route('activityLogs.index') !!}"><i class="fa fa-edit"></i><span>Activity Logs</span></a>
</li>
<li class="{{ Request::is('hotels*') ? 'active' : '' }}">
    <a href="{!! route('hotels.index') !!}"><i class="fa fa-edit"></i><span>Hotels</span></a>
</li>

<li class="{{ Request::is('employees*') ? 'active' : '' }}">
    <a href="{!! route('employees.index') !!}"><i class="fa fa-edit"></i><span>Employees</span></a>
</li>

<li class="{{ Request::is('buses*') ? 'active' : '' }}">
    <a href="{!! route('buses.index') !!}"><i class="fa fa-edit"></i><span>Buses</span></a>
</li>

<li class="{{ Request::is('busDrivers*') ? 'active' : '' }}">
    <a href="{!! route('busDrivers.index') !!}"><i class="fa fa-edit"></i><span>BusDrivers</span></a>
</li>

<li class="{{ Request::is('busOperators*') ? 'active' : '' }}">
    <a href="{!! route('busOperators.index') !!}"><i class="fa fa-edit"></i><span>BusOperators</span></a>
</li>

