<!-- resources/views/admin/applications/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Job Applications</h1>
    <a href="{{ route('admin.applications.create') }}" class="btn btn-primary">Create New Application</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Applicant Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Vacancy</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->applicant_name }}</td>
                    <td>{{ $application->email }}</td>
                    <td>{{ $application->status }}</td>
                    <td>@if($application->vacancy)
                            {{ $application->vacancy->title }}
                        @else
                            No vacancy available
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.applications.show', $application->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.applications.edit', $application->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
