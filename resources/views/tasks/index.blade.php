@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task List</h2>


<!-- Project Filter Form -->
<form method="GET" action="{{ route('tasks.index') }}" class="mb-3">
    <label for="project_id">Filter by Project:</label>
    <select name="project_id" id="project_id" class="form-control d-inline w-auto">
        <option value="">All Projects</option>
        @foreach ($projects as $project)
            <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                {{ $project->name }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
</form>

    <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Add Task</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Task List with Drag and Drop -->
    <ul id="sortable" class="sortable-list list-group">
        @foreach ($tasks as $task)
            <li data-id="{{ $task->id }}" class="list-group-item d-flex justify-content-between align-items-center">
                <span class="task-name">{{ $task->name }} (Priority: {{ $task->priority }})</span>

                <div>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
$(document).ready(function() {
    $("#sortable").sortable({
        placeholder: "ui-state-highlight",
        update: function(event, ui) {
            let order = [];
            $("#sortable li").each(function(index) {
                order.push({ id: $(this).data("id"), priority: index + 1 });
            });

            $.ajax({
                url: "{{ route('tasks.reorder') }}",
                type: "POST",
                data: {
                    order: order,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log("Task order updated successfully");
                    location.reload(); // Refresh page to update priorities
                },
                error: function(xhr) {
                    console.error("Error updating task order", xhr);
                }
            });
        }
    });

    $("#sortable").disableSelection();
});
</script>
@endsection
