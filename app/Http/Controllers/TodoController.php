<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Todo::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo created successfully.');
    }

    public function show(Todo $todo)
    {
        $this->authorizeTodo($todo);

        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        $this->authorizeTodo($todo);

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorizeTodo($todo);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,completed'],
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo updated successfully.');
    }

    public function destroy(Todo $todo)
    {
        $this->authorizeTodo($todo);

        $todo->delete();

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo deleted successfully.');
    }

    private function authorizeTodo(Todo $todo)
    {
        abort_if($todo->user_id !== auth()->id(), 403);
    }
}