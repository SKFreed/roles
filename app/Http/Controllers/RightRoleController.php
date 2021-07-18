<?php

namespace App\Http\Controllers;

use App\Right;
use App\Role;
use Illuminate\Http\Request;

class RightRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $roles = Role::all();
        return view('right_role.index', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function edit($id)
    {
        $right = Right::all()->pluck('view_name','id');
        $role = Role::find($id);
        return view('right_role.edit', compact('role', 'right'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->rights()->sync($request->right);
        return redirect()->route('right_role.index');
    }
}
