<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Doctor;
use App\Doctorhis;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::where('active',1)->get();
        return view('admin.doctors.tableviewdoctor',compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = Branch::pluck('name','id');
        $section = Section::pluck('name','id');
        return view('admin.doctors.create',compact('branch','section'));
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
            'contact'         =>'required',
            'level'          =>'required',
            'grade'      =>'required',
            'section_id'         =>'required',
            'email'          =>'required|unique:doctors',
            'commission'          =>'required',
            'baseSalary'      =>'required',
            'effectDate'         =>'required',
            'endDate'         =>'required'
        ],[
            'name.required'         =>'Staff name required',
            'gender.required'     =>'Gender required',
            'contact.required'        =>'Contact required',
            'level.required'         =>'Level required',
            'grade.required'     =>'Grade required',
            'section_id.required'        =>'Section required',
            'email.required'        =>'Email required',
            'email.unique'          =>'Email already existed',
            'commission.required'     =>'Commission required',
            'baseSalary.required'     =>'Base salary required',
            'effectDate.required'        =>'Effect date required',
            'endDate.required'        =>'End date required'
        ]);
        $id = Doctor::orderBy('id','desc')->value('id');
        $Id = $id+1;
        $name="default_user.png";
        if($file =$request->file('image')){
            $name=$Id."_".$file->getClientOriginalName();
            $file->move('photo',$name);
        }
        $doctor = new Doctor();
        $doctor->name      = trim($request->input('name'));
        $doctor->gender  = trim($request->input('gender'));
        $doctor->contact         = trim($request->input('contact'));
        $doctor->level     = trim($request->input('level'));
        $doctor->grade     = trim($request->input('grade'));
        $doctor->section_id        = trim($request->input('section_id'));
        $doctor->address        = trim($request->input('address'));
        $doctor->email         = trim($request->input('email'));
        $doctor->commission        = trim($request->input('commission'));
        $doctor->baseSalary     = trim($request->input('baseSalary'));
        $doctor->branch_id        = $request->input('branch_id');
        $doctor->effectDate        = trim($request->input('effectDate'));
        $doctor->endDate        = trim($request->input('endDate'));
        $doctor->photo        = $name;
        $doctor->user_id       = Auth::user()->id;
        $doctor->active       =1;
        $doctor->save();
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
        $doctor = Doctor::find($id);
        return view('admin.doctors.view',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $branch = Branch::pluck('name','id');
        $section = Section::pluck('name','id');
        return view('admin.doctors.edit',compact('doctor','branch','section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {//dd($request->all());

        $this->validate($request,[
            'name'          =>'required',
            'gender'      =>'required',
            'contact'         =>'required',
            'level'          =>'required',
            'grade'      =>'required',
            'section_id'         =>'required',
            'email'          =>'required',
            'commission'          =>'required',
            'baseSalary'      =>'required',
            'effectDate'         =>'required',
            'endDate'         =>'required'
        ],[
            'name.required'         =>'Staff name required',
            'gender.required'     =>'Gender required',
            'contact.required'        =>'Contact required',
            'level.required'         =>'Level required',
            'grade.required'     =>'Grade required',
            'section_id.required'        =>'Section required',
            'email.required'        =>'Email required',
            'email.unique'          =>'Email already existed',
            'commission.required'     =>'Commission required',
            'baseSalary.required'     =>'Base salary required',
            'effectDate.required'        =>'Effect date required',
            'endDate.required'        =>'End date required'
        ]);
        $id = Doctor::orderBy('id','desc')->value('id');
        $Id = $id+1;
        $filename="default_user.png";
        if($file =$request->file('imageEdit')){
            $filename=$Id."_".$file->getClientOriginalName();
            $file->move('photo',$filename);
        }
        $doctor = Doctor::find($id);
        $name = $doctor->name;
        $gender = $doctor->gender;
        $contact = $doctor->contact;
        $level = $doctor->level;
        $grade = $doctor->grade;
        $section_id = $doctor->section_id;
        $address= $doctor->address;
        $email = $doctor->email;
        $commission = $doctor->commission;
        $baseSalary = $doctor->baseSalary;
        $branch_id = $doctor->branch_id;
        $effectDate = $doctor->effectDate;
        $endDate = $doctor->endDate;
        $photo = $doctor->photo;
        $user_id = $doctor->user_id;
        if($name != trim($request->input('name')) ||
            $gender != trim($request->input('gender')) ||
            $contact != trim($request->input('contact')) ||
            $level  != trim($request->input('level')) ||
            $grade  != trim($request->input('grade')) ||
            $section_id != trim($request->input('section_id'))||
            $address   != trim($request->input('address')) ||
            $email != trim($request->input('email')) ||
            $commission != trim($request->input('commission'))||
            $baseSalary != trim($request->input('baseSalary')) ||
            $branch_id  != $request->input('branch_id') ||
            $effectDate != trim($request->input('effectDate'))||
            $endDate  != trim($request->input('endDate')) ||
            $filename != 'default_user.png')
        {
                $doctor->name      = trim($request->input('name'));
                $doctor->gender  = trim($request->input('gender'));
                $doctor->contact         = trim($request->input('contact'));
                $doctor->level     = trim($request->input('level'));
                $doctor->grade     = trim($request->input('grade'));
                $doctor->section_id        = trim($request->input('section_id'));
                $doctor->address        = trim($request->input('address'));
                $doctor->email         = trim($request->input('email'));
                $doctor->commission        = trim($request->input('commission'));
                $doctor->baseSalary     = trim($request->input('baseSalary'));
                $doctor->branch_id        = $request->input('branch_id');
                $doctor->effectDate        = trim($request->input('effectDate'));
                $doctor->endDate        = trim($request->input('endDate'));
                if($filename != 'default_user.png'){
                    $doctor->photo        = $filename;
                }
                $doctor->user_id       = Auth::user()->id;
                $doctor->save();
            $doctorHis = new Doctorhis();
            $doctorHis->doctor_id = $id;
            $doctorHis->name = $name;
            $doctorHis->gender  = $gender;
            $doctorHis->contact = $contact;
            $doctorHis->level = $level;
            $doctorHis->grade = $grade;
            $doctorHis->section_id = $section_id;
            $doctorHis->address = $address;
            $doctorHis->email = $email;
            $doctorHis->commission = $commission;
            $doctorHis->baseSalary = $baseSalary;
            $doctorHis->branch_id = $branch_id;
            $doctorHis->effectDate = $effectDate;
            $doctorHis->endDate = $endDate;
            $doctorHis->photo = $photo;
            $doctorHis->user_id = $user_id;
            $doctorHis->active       = 1;
            $doctorHis->save();

        }
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
        $doctor = Doctor::find($id);
        $doctor->active = 0;
        $doctor->user_id = Auth::user()->id;
        $doctor->save();
    }

    //Province
    public function createSection($name)
    {
        $s = new Section();
        $s->name = $name;
        $s->user_id = Auth::user()->id;
        $s->save();
        $r = Section::all();
        return response()->json($r);
    }
    public function selectSection()
    {
        $s = Section::all();
        return response()->json($s);
    }
}
