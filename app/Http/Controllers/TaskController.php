<?php

namespace App\Http\Controllers;

use App\Models\task_;
use Illuminate\Http\Request; 
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = new task_;
        $tasks = $tasks->paginate(5);
        return view('Admin.task.index', compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.task.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tasks = new task_;
        $request ->validate([
            'title' => 'string|max:100|required',
            'description' => 'string|required'
        ]);

        $tasks -> title = $request -> title;
        $tasks -> description = $request -> description;
        $tasks -> save();

        return redirect('/admin/task/')->with('message','Token stored successfull');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $task = new task_;
        $task = $task->where('id',$id) -> first();
        $task->delete();

        return redirect('/admin/task')->with('message','task has been deleted');
    }
}
