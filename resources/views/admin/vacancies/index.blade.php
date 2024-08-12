<!-- resources/views/admin/vacancies/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Vacancies</h1>
    <a href="{{ route('admin.vacancies.create') }}" class="btn btn-primary">Create New Vacancy</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vacancies as $vacancy)
                <tr>
                    <td>{{ $vacancy->title }}</td>
                    <td>{{ $vacancy->location }}</td>
                    <td>{{ $vacancy->category }}</td>
                    <td>
                        <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST" style="display:inline-block;">
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
