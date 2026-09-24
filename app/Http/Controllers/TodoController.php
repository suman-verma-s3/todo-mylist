<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $todos = $user->todos()
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->todos()->create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo created successfully.');
    }

    public function show(Todo $todo)
    {
        $this->checkOwnership($todo);

        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        $this->checkOwnership($todo);

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $this->checkOwnership($todo);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ]);

        $todo->update($validated);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo updated successfully.');
    }

    public function destroy(Todo $todo)
    {
        $this->checkOwnership($todo);

        $todo->delete();

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo deleted successfully.');
    }

    private function checkOwnership(Todo $todo)
    {
        abort_unless(
            $todo->user_id === Auth::id(),
            403
        );
    }
}