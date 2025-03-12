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

        <button type="submit" class="btn btn-success">Save Task</button>
    </form>
</div>
@endsection
