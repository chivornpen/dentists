<?php

namespace App\Http\Controllers;

use App\Treatment;
use App\Treatmenttype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class treatmentController extends Controller
{

    public function index()
    {
        return view('admin.treatment.treatmenttype');
    }
    public  function createTreatMentType(Request $re){//create
        if($re->ajax()){
            if(trim($re->khname) && trim($re->engname)){
                $tre = new Treatmenttype();
                $tre->khname = trim($re->khname);
                $tre->engname = trim($re->engname);
                $tre->active = 1;
                $tre->user_id = Auth::user()->id;
                $tre->save();
                return "<div class='alert alert-success'><strong>Success!</strong> successful insert</div>";
            }else{
                return "<div class='alert alert-danger'><strong>Failed!</strong> Data failed to insert</div>";
            }
        }
    }

    public function updateTreatmentType(Request $re){

        if(trim($re->khname) && trim($re->engname)){
            $tre = Treatmenttype::find($re->treatmentType_id);
            $tre->khname = trim($re->khname);
            $tre->engname = trim($re->engname);
            $tre->user_id = Auth::user()->id;
            $tre->save();
            return redirect()->back()->with('success','Record has been updated...');
        }else{
            return "<div class='alert alert-danger'><strong>Failed!</strong> Data failed to insert</div>";
        }
    }



    public function viewTreatMentType(){//views
        $tre = Treatmenttype::all();
        return view('admin.treatment.treatmenttype_view',compact('tre'));
    }
    public function turnOff($id){ //turn off treatment type
        $tre = Treatmenttype::find($id);
        $tre->active = 0;
        $tre->save();
    }
    public function turnOn($id){ //turn on treatment type
        $tre = Treatmenttype::find($id);
        $tre->active = 1;
        $tre->save();
    }

    public function editTreatmentType($id){
        $tre = Treatmenttype::find($id);
        return view('admin.treatment.treatmenttype_edit',compact('tre'));
    }
    public function create()
    {
        $treatType = Treatmenttype::where('active',1)->pluck('engname','id');
        return view('admin.treatment.create',compact('treatType'));
    }


    public function store(Request $request)
    {
       if($request->ajax()){
//           treatmenttype_id	khname	engname	unitPrice	dis	iscommision	authorize	authorizedate	user_id	active	created_at	updated_at

           if(trim($request->khname) && trim($request->engname) && trim($request->unit)){
               $t = new Treatment();
               $t->treatmenttype_id = $request->treatmenttype;
               $t->date = Carbon::now()->toDateString();
               $t->khname = trim($request->khname);
               $t->engname = trim($request->engname);
               $t->unitPrice = trim($request->unit);
               $t->dis = $request->dis;
               if($request->commission){
                   $t->iscommision = 1;
               }else{
                   $t->iscommision = 0;
               }
               $t->user_id = Auth::user()->id;
               $t->active = 1;
               $t->save();
               return "<div class='alert alert-success'><strong>Success!</strong> Data has been insert successfully </div>";
           }else{
               return "<div class='alert alert-danger'><strong>Warning!</strong> Data failed insert to database please check it again.</div>";
           }


       }
    }

    public function viewTreatmentJustCreate(){
        $t = Treatment::where('date','>=',Carbon::now()->toDateString())->orderBy('id','desc')->get();
        return view('admin.treatment.treatmentViewCurrentCreate',compact('t'));
    }

    public function viewTreatment(){
        return view('admin.treatment.view-treatment');
    }
    public function viewTreatmentContent(){
        $t = Treatment::orderBy('id','desc')->paginate(5);
        return view('admin.treatment.view-treatment-content',compact('t'));
    }
    public function deactiveTreatment($id){
        $treat = Treatment::find($id);
        $treat->active =0;
        $treat->save();
    }
    public function activeTreatment($id){
        $treat = Treatment::find($id);
        $treat->active =1;
        $treat->save();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $t = Treatment::find($id);
        $treatType = Treatmenttype::where('active',1)->pluck('engname','id');
        return view('admin.treatment.treatment-edit',compact('t','treatType'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'treatmenttype_id'  =>'required',
            'khname'            =>'required',
            'engname'           =>'required',
            'unitPrice'         =>'required'
        ],[
            'treatmenttype_id.required'  =>'Please choose treatment type',
            'khname.required'            =>'Khmer name required',
            'engname.required'           =>'English name required',
            'unitPrice.required'         =>'Unit Price required'
        ]);
        if(trim($request->khname) && trim($request->engname) && trim($request->unitPrice)) {
            $t = Treatment::find($id);
            $t->treatmenttype_id = $request->treatmenttype_id;
            $t->khname = trim($request->khname);
            $t->engname = trim($request->engname);
            $t->unitPrice = trim($request->unitPrice);
            $t->dis = $request->dis;
            if ($request->commission) {
                $t->iscommision = 1;
            } else {
                $t->iscommision = 0;
            }
            $t->user_id = Auth::user()->id;
            $t->save();
        }
        return redirect()->route('view-treatment');
    }


    public function destroy($id)
    {
        //
    }
}
