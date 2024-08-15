<!-- resources/views/admin/vacancies/edit.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Edit Vacancy</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.vacancies.update', $vacancy->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $vacancy->title) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $vacancy->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $vacancy->location) }}" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $vacancy->category) }}" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" name="salary" class="form-control" value="{{ old('salary', $vacancy->salary) }}">
        </div>
        <button type="submit" class="btn btn-success">Update Vacancy</button>
    </form>
@endsection
