<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class branchController extends Controller
{

    public function index()
    {

        $b = Branch::all();
        return view('admin.branch.table_content',compact('b'));
    }


    public function create()
    {
        return view('admin.branch.create');
    }


    public function store(Request $request)
    {

        $br = new Branch();
        $br->name               =  trim($request->name);
        $br->branchCode         =  0;
        $br->branchNameLocal    =  trim($request->branchlocal);
        $br->branchShortName    =  trim($request->shortname);
        $br->pCode              =  $request->pocode;
        $br->unused             =  0;
        $br->leadBranch         =  1;
        $br->user_id            = Auth::user()->id;
        $br->save();
        $id= $br->id;
        $branch ="B".sprintf('%04d',$id);
        echo $branch;
        $b = Branch::find($id);
        $b->branchCode = $branch;
        $b->save();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
