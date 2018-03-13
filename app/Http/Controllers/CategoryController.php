<?php

namespace App\Http\Controllers;

use App\Category;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::where('active',1)->get();
        return view('admin.categories.index',compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::where('active',1)->pluck('name','id');
        return view('admin.categories.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'       =>'required'
        ],[
            'name.required' =>'Category name required'
        ]);

        $cat = new Category();
        $cat->name = trim($request->input('name'));
        $cat->parent = trim($request->input('parent'));
        $cat->description = trim($request->input('description'));
        $cat->user_id = Auth::user()->id;
        $cat->active = 1;
        $cat->save();
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
    public function edit($id)
    {
        $cat = Category::find($id);
        $c = Category::where('active',1)->pluck('name','id');
        return view('admin.categories.edit',compact('cat','c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'       =>'required'
        ],[
            'name.required' =>'Category name required'
        ]);

        $cat = Category::find($id);
        $cat->name = $request->input('name');
        $cat->parent = trim($request->input('parent'));
        $cat->description = $request->input('description');
        $cat->user_id = Auth::user()->id;
        $cat->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->active = 0;
        $cat->save();
        return redirect()->back();
    }
    public function getSelectParent()
    {
        $s = Category::where('active',1)->get();
        return response()->json($s);
    }
}
