@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Projects</h2>
    <a href="{{ route('projects.create') }}" class="btn btn-success mb-3">Add Project</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <ul class="list-group">
        @foreach ($projects as $project)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $project->name }}</span>
                <div>
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
