<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = Todo::all();
        return view('todo.index', ['items' => $items]);
    }



    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $request->validate([
            'updateTodo' => 'required|max:20',
            'updateDeadline' => 'nullable|after:"now"',
        ]);
        $todo = Todo::find($request->id);
        $todo->todo = $request->updateTodo;
        $todo->deadline = $request->updateDeadline;
        $todo->save();
        return redirect()->route('/');
    }
    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('todo/delete', ['form' => $todo]);
    }
}
