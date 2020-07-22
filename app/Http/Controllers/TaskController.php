<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\Priority;
use App\StatusTask;
use App\Task;
use App\TasksFilter;
use App\User;
use Illuminate\Http\Request;
use PHPUnit\Util\Filter;

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

    public function store(Request $req){
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

    public function view(){
            //Get filter
            $filter = TasksFilter::where('owner',Auth::id())->first();

            //Construct Where
            $where = [];
            if(!is_null($filter)){
                if($filter->user !== 0)
                    $where[] = ['user',$filter->user];
                if($filter->enterprise !== 0)
                    $where[] = ['enterprise',$filter->enterprise];
                if($filter->group !== 0)
                    $where[] = ['group',$filter->group];
                if($filter->status !== 0)
                    $where[] = ['status',$filter->status];
                if($filter->order !== 0)
                    $where[] = ['order',$filter->order];
                if($filter->key_word !== 0)
                    $where[] = ['name','like','%'. $filter->key_word .'%'];
                /*
                 * Add filter key word to filter in name or description,
                 * */
            }

            $tasks = Task::where($where)->get();

            //return View with $tasks;
    }
}
