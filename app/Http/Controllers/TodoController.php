<?php

namespace App\Http\Controllers;

use League\Flysystem\RootViolationException;
use mysqli;
use PhpParser\Node\Expr\PostDec;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }
    public function post(Request $request)
    {
        $_token=$request->content;
        $data=[
            'content'=>$_token
        ];
        return view('todo.index',$data);
    }

    
    public function create(Request $request)
    {
            $request->validate([
                'newTodo' => 'required|max:20',
                'newDeadline' => 'nullable|after:"now',
            ]);
            Todo::crate([
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

