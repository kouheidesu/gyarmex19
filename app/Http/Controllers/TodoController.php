<?php

namespace App\Http\Controllers;

class TodoController extends Controller
{
    public function index(){
        return view('todo.index');
    }
    public function create()
    {
        return view('todo.index');
    }
    public function update()
    {
        return "gikganntou";
    }               
    public function delete()
    {
        return "tokyouzaformation";
    }
}
