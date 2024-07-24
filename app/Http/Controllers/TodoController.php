<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function show()
    {
        // $todos = Todo::all();
        // $todofait = Todo::where("fait","=", 1)->get();
        // $todo_non_fait = Todo::where("fait","=", 1)->get();
        // $todo = $request->input('todo');
        // dd($todo);
        $todofait = Todo::select("*")->where("fait", 1)->get();
        $todo_non_fait = Todo::select("*")->where("fait", 0)->get();
        return view("Todo.show", compact("todofait", "todo_non_fait"));
    }

    public function store(TodoRequest $request)
    {
        $todo = Todo::create($request->validated());
        return redirect()->route("Todo.info", ["todo" => $todo->id])->with("success", "Tache créée avec success");
    }
    public function info(Todo $todo)
    {
        // $id = $todo->id;
        // return view("Todo.info", compact('id'));
        return view("Todo.info", ["tache" => $todo]);
    }
    public function editpage(Todo $todo)
    {
        return view("Todo.edit", [
            'todo' => $todo,
        ]);
    }
    public function edit(TodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
        return redirect()->route("Todo.info", ["todo" => $todo->id])->with("success", "Tache modifiée avec success");
    }

    public function chageState(Todo $todo)
    {
        if ($todo->fait == 1) {
            $todo->update(
                [
                    "fait" => 0,
                ]
            );
            return redirect()->route("Todo.show")->with("success", "La tâche : " . $todo->nom . " a été desativé avec succes");

        } else {
            $todo->update(
                [
                    "fait" => 1,
                ]
            );
            return redirect()->route("Todo.show")->with("success", "Bravo vous avez effectuez la tâche : ".$todo->nom);
        }
    }
    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->route("Todo.show")->with("success","supprimer avec success");
    }
    public function paginatefait(){
        $todofait = Todo::where("fait" , 1)->paginate(1);
        return view("Todo.paginatefait" ,compact("todofait"));
    }
}