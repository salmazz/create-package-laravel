<?php

namespace Salmazz\Todolist\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Salmazz\Todolist\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return redirect()->route('task.create');
    }

    public function create()
    {
        $tasks = Task::all();
        $submit = 'Add';
        return view('salmazz.todolist.list', compact('tasks', 'submit'));
    }

    public function store()
    {
        $input = Request::all();
        Task::create($input);
        return redirect()->route('task.create');
    }

    public function edit($id)
    {
        $tasks = Task::all();
        $task = $tasks->find($id);
        $submit = 'Update';
        return view('salmazz.todolist.list', compact('tasks', 'task', 'submit'));
    }

    public function update($id)
    {
        $input = Request::all();
        $task = Task::findOrFail($id);
        $task->update($input);
        return redirect()->route('task.create');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.create');
    }
}
