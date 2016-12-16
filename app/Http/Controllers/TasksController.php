<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use Bican\Roles\Exceptions\RoleDeniedException;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;
use Session;

class TasksController extends Controller
{
    function __construct()
    {
        if (!\Auth::check()) {
            throw new RoleDeniedException(-1);
        }
        $this->middleware('role:admin', ['only' => ['store', 'create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $role = \Auth::user()->getRole();
        if(\Auth::user()->is(1)){ // is admin
            $tasks = Task::paginate(25);
        }else{
            $tasks = Task::where('role_id', $role->id)->paginate(25);
        }

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        array_forget($requestData, '_token');

        Task::create($requestData);

        Session::flash('flash_message', 'Task added!');

        return redirect('admin/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('admin.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $requestData = $request->all();
        array_forget($requestData, '_token');

        $task = Task::findOrFail($id);

        if ($this->taskRoleMatch($task)) {
            return redirect()->back();
        }
        $task->update($requestData);

        Session::flash('flash_message', 'Task updated!');

        return redirect('admin/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Task::destroy($id);

        Session::flash('flash_message', 'Task deleted!');

        return redirect('admin/tasks');
    }

    private function taskRoleMatch(Task $task, Role $role = null)
    {
        if (!\Auth::check()) return null;
        if ($role === null) {
            $role = \Auth::user()->getRoles()->first();
        }
        return $task->role()->getResults()->id != $role->getKey();
    }
}
