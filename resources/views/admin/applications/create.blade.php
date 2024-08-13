<!-- resources/views/admin/applications/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Job Application</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.applications.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="job_id">Job</label>
            <select name="job_id" class="form-control" required>
                @foreach($vacancies as $vacancy)
                    <option value="{{ $vacancy->id }}">{{ $vacancy->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="applicant_name">Applicant Name</label>
            <input type="text" name="applicant_name" class="form-control" value="{{ old('applicant_name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Applicant Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="resume">Resume</label>
            <textarea name="resume" class="form-control" required>{{ old('resume') }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" @if(old('status') == 'pending') selected @endif>Pending</option>
                <option value="accepted" @if(old('status') == 'accepted') selected @endif>Accepted</option>
                <option value="rejected" @if(old('status') == 'rejected') selected @endif>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Application</button>
    </form>
@endsection
