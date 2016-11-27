<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;
use Session;
use Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(25);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $roles = Role::all('id','name');
        foreach ($roles as $role){
            $rolesAll[$role->id] = $role->name;
        }
        return view('admin.users.create', compact('rolesAll'));
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

        $user = User::create($requestData);
        $user->detachAllRoles();
        $user->attachRole(Role::findOrFail($requestData['roles']));
        Session::flash('flash_message', 'User eklendi!');

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all('id','name');
        foreach ($roles as $role){
            $rolesAll[$role->id] = $role->name;
        }
        return view('admin.users.edit', compact('user', 'rolesAll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        if (isset($requestData['password'])) {
            if ((strlen($requestData['password']) != 0)) {
                $requestData['password'] = Hash::make($requestData['password']);
            }
        }
        $user = User::findOrFail($id);
        $user->update($requestData);
        $user->detachAllRoles();
        $user->attachRole(Role::findOrFail($requestData['roles']));
        Session::flash('flash_message', 'User güncellendi!');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('flash_message', 'User silindi!');

        return redirect('admin/users');
    }
}
