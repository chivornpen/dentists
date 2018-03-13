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
        if($request->ajax()){
            $leadbranch = 0;
            if ($request->leadbranch){
                $leadbranch=1;
            }
            $br = new Branch();
            $br->name               =  trim($request->name);
            $br->branchCode         =  0;
            $br->branchNameLocal    =  trim($request->branchlocal);
            $br->branchShortName    =  trim($request->shortname);
            $br->pCode              =  $request->pcode;
            $br->unused             =  0;
            $br->leadBranch         =  $leadbranch;
            $br->user_id            = Auth::user()->id;
            $br->save();
            $id= $br->id;
            $branch ="B".sprintf('%04d',$id);
            $b = Branch::find($id);
            $b->branchCode = $branch;
            $b->save();
        }
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
        $leadbranch = 0;
        if ($request->leadBranch){
            $leadbranch=1;
        }
        $br = $b = Branch::find($id);
        $br->name               =  trim($request->name);
        $br->branchNameLocal    =  trim($request->branchNameLocal);
        $br->branchShortName    =  trim($request->branchShortName);
        $br->pCode              =  $request->pCode;
        $br->leadBranch         =  $leadbranch;
        $br->user_id            = Auth::user()->id;
        $br->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }

    public function turnOff($id){
        $b = Branch::find($id);
        $b->unused = 1;
        $b->save();
    }
    public function turnOn($id){
        $b = Branch::find($id);
        $b->unused = 0;
        $b->save();
    }

    public function editBranch($id){
        $b = $b = Branch::find($id);
        return view('admin.branch.edit',compact('b'));

    }

}
