<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index(){
        $todo = Todo::orderBy('id','desc')->paginate();
        return view('todo.index', ['categories' => Category::all(), 'todo' => $todo ]);
    }

    public function tareaLista(Todo $todo){
        $todo->is_complete = 1;
        $todo->save();

        return response()->json(['status' => true, 'todo' => $todo]);
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name'        => 'required|max:255',
            'description' => 'required|max:600',
            'limit_date'  => 'required|date',
            'category_id' => 'required|integer',
        ]);

        $todo = new Todo();
        $todo->name        = $request->name;
        $todo->description = $request->description;
        $todo->limit_date  = $request->limit_date;
        $todo->order       = 1;
        $todo->is_complete = 0;
        $todo->user_id     = rand(1,10);
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todo.index')->with(['mensaje' => 'Todo bien']);

    }

    public function edit(Todo $todo){
        return view('todo.edit',['todo' => $todo, 'categories' => Category::all() ]);
    }

    public function update(Request $request, Todo $todo){

        $todo->name        = $request->name;
        $todo->description = $request->description;
        $todo->limit_date  = $request->limit_date;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todo.index')->with(['mensaje' => 'Todo Actulizado']);
    }

    public function destroy(Todo $todo){

        $todo->delete();
        return redirect()->route('todo.index')->with(['mensaje' => 'Todo Borrado']);
    }
}
