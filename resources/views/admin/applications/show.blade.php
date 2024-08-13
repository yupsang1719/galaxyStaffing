<!-- resources/views/admin/applications/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Application Details</h1>

    <div class="card">
        <div class="card-header">
            <h2>Application for: {{ $application->vacancy->title ?? 'No Vacancy Title' }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Applicant Name:</strong> {{ $application->applicant_name }}</p>
            <p><strong>Email:</strong> {{ $application->email }}</p>
            <p><strong>Phone:</strong> {{ $application->phone ?? 'Not Provided' }}</p>
            <p><strong>Resume:</strong> <a href="{{ $application->resume }}" target="_blank">View Resume</a></p>
            <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
            <p><strong>Submitted At:</strong> {{ $application->created_at->format('d M Y, h:i A') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.applications.index') }}" class="btn btn-primary">Back to Applications</a>
            <a href="{{ route('admin.applications.edit', $application->id) }}" class="btn btn-warning">Edit Application</a>
            <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this application?')">Delete Application</button>
            </form>
        </div>
    </div>
@endsection
