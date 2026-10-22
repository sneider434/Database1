<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('events.index') }}"
                       class="nav-link {{ request()->routeIs('events.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Events</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('attendees.index') }}"
                       class="nav-link {{ request()->routeIs('attendees.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Attendees</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('registrations.index') }}"
                       class="nav-link {{ request()->routeIs('registrations.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>Registrations</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
