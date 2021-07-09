<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index(Request $request)
    {
        return view('todo.index');
    }

    public function add(Request $request)
    {
        return view('/todo/create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        Todo::create($form);
        return redirect('/');

    }

   

    public function hello(Request $request)
    {
            $request->validate([
                'newTodo' => 'required|max:20',
                'newDeadline' => 'nullable|after:"now',
            ]);
            Todo::create([
                'todo' =>$request->newTodo,
                'deadline'=>$request->newDeadline,
            ]);

            return view('todo.index');
        }


    
    public function update(Request $request, $id)
    {
        $request-validate([
            'updateTodo' =>'required|max:20',
            'updateDeadline' =>'nullable|after:"now"',
        ]);
        $todo = Todo::find($id);
        $todo->todo = $request->updateTodo;
        $todo->deadline = $request->updateDeadline;
        $todo->save();
        return redirect()->route('todo.index'); 
        
    }               
    public function delete($id)
    {
        $todo=Todo::find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}

