<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Branch;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supply::where('active',1)->get();
        return view('admin.suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = Branch::pluck('name','id');
        return view('admin.suppliers.create',compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $sup = new Supply();
            $sup->companyKhName = trim($request->input('companyKhName'));
            $sup->companyEnName = trim($request->input('companyEnName'));
            $sup->zipCode = trim($request->input('zipCode'));
            $sup->personalName = trim($request->input('personalName'));
            $sup->email = trim($request->input('email'));
            $sup->personalContact = trim($request->input('personalContact'));
            $sup->location = trim($request->input('location'));
            $sup->branch_id = trim($request->input('branch_id'));
            $sup->user_id = Auth::user()->id;
            $sup->active = 1;
            $sup->save();
        }
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
        $sup = Supply::find($id);
        $branch = Branch::pluck('name','id');
        return view('admin.suppliers.edit',compact('branch','sup'));
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
        $sup = Supply::find($id);
        $sup->companyKhName = trim($request->input('companyKhName'));
        $sup->companyEnName = trim($request->input('companyEnName'));
        $sup->zipCode = trim($request->input('zipCode'));
        $sup->personalName = trim($request->input('personalName'));
        $sup->email = trim($request->input('email'));
        $sup->personalContact = trim($request->input('personalContact'));
        $sup->location = trim($request->input('location'));
        $sup->branch_id = trim($request->input('branch_id'));
        $sup->user_id = Auth::user()->id;
        $sup->save();
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
        $sup = Supply::find($id);
        $sup->active = 0;
        $sup->save();
    }
}
