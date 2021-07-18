<?php

namespace App\Http\Controllers;

use App\Right;
use App\User;
use Illuminate\Http\Request;

class RightUserController extends Controller
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
        $users = User::all();
        return view('right_user.index', compact('users'));
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
        $user = User::find($id);
        return view('right_user.edit', compact('user', 'right'));
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
        $user = User::find($id);
        $user->rights()->sync($request->right);
        return redirect()->route('right_user.index');
    }
}
