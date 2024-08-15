<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('admin-content')
    <h1>Admin Dashboard</h1>
    <div class="dashboard-widgets">
        <div class="widget">
            <h2>Total Vacancies</h2>
            <p>{{ $vacancyCount }}</p>
        </div>
        <div class="widget">
            <h2>Total Applications</h2>
            <p>{{ $applicationCount }}</p>
        </div>
    </div>
@endsection
