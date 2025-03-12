@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Task Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="priority">Priority:</label>
            <input type="number" name="priority" class="form-control" required min="1">
        </div>

        <div class="form-group">
            <label for="project_id">Project:</label>
            <select name="project_id" class="form-control">
                <option value="">Select a Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save Task</button>
    </form>
</div>
@endsection
