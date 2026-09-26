<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('user')
            ->latest()
            ->get();

        return view('admin.todo.index', compact('todos'));
    }

    public function create()
    {
        $users = User::role('user')
            ->orderBy('name')
            ->get();

        return view('admin.todo.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'in:low,medium,high'],
            'due_date' => ['nullable', 'date'],
        ]);

        Todo::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
            'priority' => $request->priority,
            'due_date' => $request->due_date,
        ]);

        return redirect()
            ->route('admin.todos.index')
            ->with('success', 'Task assigned successfully.');
    }
}