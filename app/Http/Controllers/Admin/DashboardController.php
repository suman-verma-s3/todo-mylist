<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTodos = Todo::count();

        $pendingTodos = Todo::where('status', 'pending')->count();

        $completedTodos = Todo::where('status', 'completed')->count();

        return view('admin.dashboard', compact(
            'totalTodos',
            'pendingTodos',
            'completedTodos'
        ));
    }
}