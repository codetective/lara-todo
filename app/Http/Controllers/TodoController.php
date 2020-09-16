<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function compact;
use function dd;
use function dump;
use function redirect;
use function view;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();

        return view('todo',compact('todos'));
    }

    public function delete($id){
        DB::table('todos')->where('id','=', $id)->delete();
        return redirect('/');
    }
    public function edit(Request $request, $id){
        DB::table('todos')->where('id','=', $id)->update(['name' => $request->name, 'description'=>$request->description]);
        return redirect('/');
    }

    public function create(Request $request){

        $this->validate($request,[
           "name"=>"required",
           "description"=>"required"
        ]);


       $todo = new Todo();

       $todo->name = $request->input('name');
       $todo->description = $request->input('description');

       $todo->save();



       return redirect::back()->with('status','working');
    }
}

