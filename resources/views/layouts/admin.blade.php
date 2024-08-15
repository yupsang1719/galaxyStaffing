<!-- resources/views/layouts/admin.blade.php -->

@extends('layouts.app')

@vite(['resources/sass/admin.scss', 'resources/js/app.js'])



@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-1">
            @include('partials.admin.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-md-11">
            <div id="admin-content" class="admin-content">
                @yield('admin-content')
            </div>
        </div>
    </div>
</div>
@endsection
