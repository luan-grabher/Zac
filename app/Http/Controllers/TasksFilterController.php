<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\Priority;
use App\StatusTask;
use App\TasksFilter;
use App\TasksOrder;
use App\User;
use App\WorkGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksFilterController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        $enterprises = Enterprise::orderBy('name')->get();
        $orders = TasksOrder::orderBy('name')->get();
        $groups = WorkGroup::orderBy('name')->get();
        $status = StatusTask::all();

        return view("tasks.filter", ['users' => $users, 'enterprises' => $enterprises, 'orders' => $orders, 'groups' => $groups, 'status' => $status]);
    }

    public function store(Request $req)
    {
        $owner = Auth::user();

        $req->validate([
            'user' => 'required|numeric',
            'enterprise' => 'required|numeric',
            'group' => 'required|numeric',
            'order' => 'required|numeric',
            'keyWord' => 'nullable|max:100',
            'status' => 'required|numeric'
        ]);

        $filter = TasksFilter::updateOrCreate(
            ['owner' => $owner->id],
            [
                'user' => $req->user == 0 ? null : $req->user,
                'enterprise' => $req->enterprise == 0 ? null : $req->enterprise,
                'group' => $req->group == 0 ? null : $req->group,
                'order' => $req->group == 0 ? null : $req->order,
                'key_word' => $req->keyWord,
                'status' => $req->status
            ]
        );


        $filter->save();

        return redirect()->route('tasks_add');
    }
}
