<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('activityLogs*') ? 'active' : '' }}">
    <a href="{!! route('activityLogs.index') !!}"><i class="fa fa-edit"></i><span>Activity Logs</span></a>
</li>
