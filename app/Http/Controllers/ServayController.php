<?php

namespace App\Http\Controllers;

use App\Category;
use App\Servay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ServayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servay = Servay::where('active',1)->get();
        return view('admin.servays.create',compact('servay'));
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
            'name.required' =>'Servay name required'
        ]);

        $servay = new Servay();
        $servay->name = $request->input('name');
        $servay->description = $request->input('description');
        $servay->user_id = Auth::user()->id;
        $servay->active = 1;
        $servay->save();
        return redirect()->back();
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
        $servay = Servay::find($id);
        return view('admin.servays.edit',compact('servay'));
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
            'name.required' =>'Servay name required'
        ]);

        $servay = Servay::find($id);
        $servay->name = $request->input('name');
        $servay->description = $request->input('description');
        $servay->user_id = Auth::user()->id;
        $servay->save();
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
        $servay = Servay::find($id);
        $servay->active = 0;
        $servay->save();
        return redirect()->back();
    }
}
