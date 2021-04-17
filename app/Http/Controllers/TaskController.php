<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $attribute = $request->validate([
            'title' => 'required'
        ]);

        Task::create($attribute);
        return redirect()->route('task.index')->with('msg', 'Task has been created' );

    }
    public function destroy($id)
    {
         Task::destroy($id);

         return redirect()->route('task.index')->with('msg', 'Task has been deleted');
    }


}
