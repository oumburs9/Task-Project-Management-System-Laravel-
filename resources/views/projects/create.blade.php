@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Project</h2>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save Project</button>
    </form>
</div>
@endsection
