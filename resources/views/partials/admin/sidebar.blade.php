<!-- resources/views/partials/admin/sidebar.blade.php -->

<div class="sidebar bg-light">
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="list-group-item"><a href="{{ route('admin.vacancies.index') }}">Manage Vacancies</a></li>
        <li class="list-group-item"><a href="{{ route('admin.applications.index') }}">Manage Applications</a></li>
        <!-- Add more links as needed -->
    </ul>
</div>
