<div class="side-nav">
    <ul>
        <li><h3>GENERAL</h3></li>
        <li><a href="/administration" class="{{ Request::is('administration') ? 'nav-active' : '' }}"><h5>Dashboard</h5></a></li>
        <li><a href="/reports" class="{{ Request::is('reports') ? 'nav-active' : '' }}"><h5>Reports</h5></a></li>
        <li><a href="/announcements" class="{{ Request::is('announcements') ? 'nav-active' : '' }}"><h5>Announcement</h5></a></li>
    </ul>
    <ul>
        <li><h3>TICKETS</h3></li>
        <li><a href="/tickets-list/{{ session('username') }}" class="{{ Request::is('tickets-list' . '/' . session('username') . '') ? 'nav-active' : '' }}"><h5>Assigned to me</h5></a></li>
        <li><a href="/tickets-list/open" class="{{ Request::is('tickets-list/open') ? 'nav-active' : '' }}"><h5>Open</h5></a></li>
        <li><a href="/tickets-list/unassigned" class="{{ Request::is('tickets-list/unassigned') ? 'nav-active' : '' }}"><h5>Open - Unassigned</h5></a></li>
        <li><a href="/tickets-list/resolved" class="{{ Request::is('tickets-list/resolved') ? 'nav-active' : '' }}"><h5>Resolved</h5></a></li>
        <li><a href="/tickets-list/all" class="{{ Request::is('tickets-list/all') ? 'nav-active' : '' }}"><h5>All Tickets</h5></a></li>
        <li><a href="/" class="{{ Request::is('tickets-create-new') ? 'nav-active' : '' }}"><h5>Create New</h5></a></li>
    </ul>
    <ul>
        <li><h3>SETTINGS</h3></li>
        <li><a href="#" class="{{ Request::is('') ? 'nav-active' : '' }}"><h5>Departments</h5></a></li>
        <li><a href="#" class="{{ Request::is('') ? 'nav-active' : '' }}"><h5>Priorities</h5></a></li>
        <li><a href="/secret-create-users" class="{{ Request::is('secret-create-users') ? 'nav-active' : '' }}"><h5>Users</h5></a></li>
        <li><a href="#" class="{{ Request::is('') ? 'nav-active' : '' }}"><h5>User Roles</h5></a></li>
        <li><a href="#" class="{{ Request::is('') ? 'nav-active' : '' }}"><h5>Theme</h5></a></li>
        <li><a href="/change-password" class="{{ Request::is('') ? 'nav-active' : '' }}"><h5>Change Password</h5></a></li>
        <li><a href="/reset-user-password" class="{{ Request::is('') ? 'nav-active' : '' }}"><h5>Reset User Password</h5></a></li>
    </ul>
</div>