<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::where('active',1)->get();
        return view('admin.staffs.tableviewstaff',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = Branch::pluck('name','id');
        return view('admin.staffs.create',compact('branch'));
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
            'name'          =>'required',
            'gender'      =>'required',
            'level'      =>'required',
            'contact'         =>'required',
            'email'          =>'required|unique:staff',
            'commission'          =>'required',
            'baseSalary'      =>'required',
            'effectDate'         =>'required',
            'endDate'         =>'required'
        ],[
            'name.required'         =>'Staff name required',
            'gender.required'     =>'Gender required',
            'level.required'     =>'Level required',
            'contact.required'        =>'Contact required',
            'email.required'        =>'Email required',
            'email.unique'          =>'Email already existed',
            'commission.required'     =>'Commission required',
            'baseSalary.required'     =>'Base salary required',
            'effectDate.required'        =>'Effect date required',
            'endDate.required'        =>'End date required'
        ]);
        $id = Staff::orderBy('id','desc')->value('id');
        $Id = $id+1;
        $name="default_user.png";
        if($file =$request->file('image')){
            $name=$Id."_".$file->getClientOriginalName();
            $file->move('photo',$name);
        }
        $staff = new Staff();
        $staff->name      = trim($request->input('name'));
        $staff->gender  = trim($request->input('gender'));
        $staff->contact         = trim($request->input('contact'));
        $staff->email         = trim($request->input('email'));
        $staff->level     = trim($request->input('level'));
        $staff->commission        = trim($request->input('commission'));
        $staff->baseSalary     = trim($request->input('baseSalary'));
        $staff->branch_id        = $request->input('branch_id');
        $staff->effectDate        = trim($request->input('effectDate'));
        $staff->endDate        = trim($request->input('endDate'));
        $staff->address        = trim($request->input('address'));
        $staff->photo        = $name;
        $staff->user_id       = Auth::user()->id;
        $staff->active       =1;
        $staff->save();

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
        $staff = Staff::find($id);
        return view('admin.staffs.view',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        $branch = Branch::pluck('name','id');
        ;return view('admin.staffs.edit',compact('staff','branch'));
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
            'name'          =>'required',
            'gender'      =>'required',
            'level'         =>'required',
            'contact'         =>'required',
            'email'          =>'required',
            'commission'          =>'required',
            'baseSalary'      =>'required',
            'effectDate'         =>'required',
            'endDate'         =>'required'
        ],[
            'name.required'         =>'Staff name required',
            'gender.required'     =>'Gender required',
            'level.required'     =>'Level required',
            'contact.required'        =>'Contact required',
            'email.required'        =>'Email required',
            'commission.required'     =>'Commission required',
            'baseSalary.required'     =>'Base salary required',
            'effectDate.required'        =>'Effect date required',
            'endDate.required'        =>'End date required'
        ]);

        $staff = Staff::find($id);
        $oldPhoto = $staff->photo;
        $name="default_user.png";
        if($file =$request->file('imageEdit')){
            $name=$id."_".$file->getClientOriginalName();
            $file->move('photo',$name);
        }
        $staff->name      = trim($request->input('name'));
        $staff->gender  = trim($request->input('gender'));
        $staff->contact         = trim($request->input('contact'));
        $staff->email         = trim($request->input('email'));
        $staff->level     = trim($request->input('level'));
        $staff->commission        = trim($request->input('commission'));
        $staff->baseSalary     = trim($request->input('baseSalary'));
        $staff->branch_id        = $request->input('branch_id');
        $staff->effectDate        = trim($request->input('effectDate'));
        $staff->endDate        = trim($request->input('endDate'));
        $staff->address        = trim($request->input('address'));
        if($request->file('imageEdit')!=null){
            $staff->photo        = $name;
            if($oldPhoto!='default_user.png'){
                unlink("photo/$oldPhoto");
            }
        }
        $staff->user_id       = Auth::user()->id;
        $staff->save();

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
        $staff = Staff::find($id);
        $staff->active = 0;
        $staff->user_id = Auth::user()->id;
        $staff->save();
    }
}
