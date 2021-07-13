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
        $todo = Todo::find($request->id);
        $todo->content = $request->content;
        $todo->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('/', ['form' => $todo]);
    }
}
