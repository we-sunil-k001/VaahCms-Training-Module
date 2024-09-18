<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Fetch all Todos
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Fetch single Todos
     */
    public function show(Todo $todo)
    {
        return $todo;
    }

    /**
     * Create a new Todo
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:todos,name',
            'description' => 'required',
        ]);

        return Todo::create($request->all());
    }

    /**
     * Update the specified Todo
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'name' => 'sometimes|required|unique:todos,name,' . $todo->id,  //this validates name - unique from other existing rows except its own row **$todo->id**
            'description' => 'sometimes|required',
        ]);

        $todo->update($request->all());
        return $todo;
    }

    /**
     * Mark task as completed
     */
    public function markComplete(Todo $todo)
    {
        $todo->update(['is_completed'=> true]);
        //dd($todo);
        return $todo;
    }

    /**
     * Mark task as Pending
     */
    public function markPending(Todo $todo)
    {
        $todo->update(['is_completed'=> false]);
        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
