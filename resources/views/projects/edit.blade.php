@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Project</h2>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $project->name }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Project</button>
    </form>
</div>
@endsection
