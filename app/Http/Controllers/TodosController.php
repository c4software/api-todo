<?php

namespace App\Http\Controllers;

use App\Todos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TodoController extends Controller{
  public function liste(){
    $todos  = Todos::all();
    return response()->json($todos);
  }

  public function saveTodo(Request $request){
    $todo = Todos::create($request->all());
    if($todo){
      return response()->json("success");
    }else{
      return response()->json("error");      
    }
  }

  public function markAsDone($id){
    $todo  = Todos::find($id);
    if($todo){
      $todo->termine = 1;
      $todo->save();
      return response()->json("success");
    }else{
      return response()->json("error");
    }
  }

  public function deleteTodo($id){
    $todo  = Todos::find($id);
    if($todo && $todo->termine){
      $todo->delete();
      return response()->json('success');
    }else{
      return response()->json('error');
    }
  }
}
