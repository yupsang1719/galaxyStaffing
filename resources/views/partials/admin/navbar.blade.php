<!-- resources/views/partials/admin/navbar.blade.php -->

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand">Admin Dashboard</span>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>
        </ul>
    </div>
</nav>
