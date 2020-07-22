<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\Priority;
use App\StatusTask;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //View Tasks
        return view('tasks.tasks');
    }

    public function add()
    {
        //Get users lists
        $users = User::orderBy('name')->get();

        //Get enterprise list
        $enterprises = Enterprise::orderBy('name')->get();


        //Get priority list
        $priorities = Priority::all();

        //View Tasks
        return view('tasks.add',['users'=>$users,'enterprises'=>$enterprises,'priorities'=>$priorities]);
    }

    public function addPost(Request $req){
        $req->validate([
            'name' => 'required|max:200',
            'description' => 'nullable',
            'user' => 'required|numeric',
            'enterprise' => 'required|numeric',
            'priority' => 'required|numeric',
            'reference'=> 'nullable|numeric|max:300000|min:200000',
            'deadline' => 'nullable|date'
        ]);


        $task = new Task();
        $task->name = $req->name;
        $task->description = is_null($req->description)?$req->name:$req->description;
        $task->user = $req->user;
        $task->enterprise = $req->enterprise;
        $task->priority = $req->priority;
        $task->reference = $req->reference;
        $task->save();

        return redirect()->back()->with('message', 'Tarefa ' . $task->name . ' criada para ' . User::find($task->user)->name . '!');;
    }
}
