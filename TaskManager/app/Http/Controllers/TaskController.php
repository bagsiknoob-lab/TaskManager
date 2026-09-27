<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', ['tasks' => Task::latest()->get()]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Task::create($request->all());
        return redirect('/tasks')->with('success', 'Task added!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate(['title' => 'required', 'status' => 'required']);
        $task->update($request->all());
        return redirect('/tasks')->with('success', 'Updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks')->with('success', 'Deleted!');
    }

    public function toggle(Task $task)
    {
        $task->status = $task->status === 'pending' ? 'completed' : 'pending';
        $task->save();
        return back();
    }
}