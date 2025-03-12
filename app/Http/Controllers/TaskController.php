<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::orderBy('priority', 'asc');

        // Apply priority filter if selected
        if ($request->has('priority') && !empty($request->priority)) {
            $query->where('priority', $request->priority);
        }

        $tasks = $query->get();

        // Get the dynamic range of priorities
        $minPriority = Task::min('priority') ?? 1; // Default to 1 if no tasks exist
        $maxPriority = Task::max('priority') ?? 10; // Default to 10 if no tasks exist

        return view('tasks.index', compact('tasks', 'minPriority', 'maxPriority'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer|min:1',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer|min:1',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }


    /**
     * Reorder the tasks
     */
    public function reorder(Request $request)
    {
        foreach ($request->order as $task) {
            Task::where('id', $task['id'])->update(['priority' => $task['priority']]);
        }

        return response()->json(['message' => 'Task priorities updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
