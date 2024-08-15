<!-- resources/views/admin/applications/edit.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Edit Job Application</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.applications.update', $application->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="job_id">Job</label>
            <select name="job_id" class="form-control" required>
                @foreach($vacancies as $vacancy)
                    <option value="{{ $vacancy->id }}" @if($vacancy->id == $application->job_id) selected @endif>{{ $vacancy->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="applicant_name">Applicant Name</label>
            <input type="text" name="applicant_name" class="form-control" value="{{ old('applicant_name', $application->applicant_name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Applicant Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $application->email) }}" required>
        </div>

        <div class="form-group">
            <label for="resume">Resume</label>
            <textarea name="resume" class="form-control" required>{{ old('resume', $application->resume) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" @if($application->status == 'pending') selected @endif>Pending</option>
                <option value="accepted" @if($application->status == 'accepted') selected @endif>Accepted</option>
                <option value="rejected" @if($application->status == 'rejected') selected @endif>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Application</button>
    </form>
@endsection
