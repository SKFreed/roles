<?php

namespace App\Http\Controllers;


use App\Right;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $rights = Right::paginate(10); // получить первые 10 значений таблицы и вызвать пагинатор
        //$categories = Category::all(); // Получить все значения таблицы
        //return view('start', ['categories' => $categories]);
        return view('right.index', compact('rights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('right.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $right = new Right();
        $right->name = $request->name;
        $right->view_name = $request->view_name;
        $right->save();

        return redirect()->route('right.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Right $right)
    {
        $right = Right::find($right->id);
        return view('right.edit', compact('right'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, Right $right)
    {
        {
            $right = Right::find($right->id);
            $right->name = $request->name;
            $right->view_name = $request->view_name;

            $right->save();

            return redirect()->route('right.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Right $right)
    {
        $right = Right::find($right->id);
        $right->delete();

        return redirect()->route('right.index');
    }
}
