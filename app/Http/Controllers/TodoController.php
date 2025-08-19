<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request) {
        $request->validate(['title' => 'required']);
        Todo::create(['title' => $request->title]);
        return redirect()->back();
    }

    public function toggle(Todo $todo) {
        $todo->completed = !$todo->completed;
        $todo->save();
        return redirect()->back();
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        return redirect()->back();
    }
}
