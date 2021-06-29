<?php

namespace App\Http\Controllers;

use League\Flysystem\RootViolationException;
use mysqli;
use PhpParser\Node\Expr\PostDec;

class TodoController extends Controller
{
    public function index()
    {
        $data = [
            'content' => '自由に入力してください',
        ];
        return view('todo.index', $data);
    }
    public function post(Request $request)
    {
        $content = $request->content;
        $data = [
            'content' => $content . 'と入力しましたね'
        ];
        return view('todo.index', $data);
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