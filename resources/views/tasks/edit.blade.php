@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="project_id">Project:</label>
            <select name="project_id" class="form-control">
                <option value="">Select a Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Task Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $task->name }}" required>
        </div>

        <div class="form-group">
            <label for="priority">Priority:</label>
            <input type="number" name="priority" class="form-control" value="{{ $task->priority }}" required min="1">
        </div>

        <button type="submit" class="btn btn-success">Update Task</button>
    </form>
</div>
@endsection
