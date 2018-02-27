<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Client;
use App\Clienthis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Tests\Fixtures\ClearableService;

class clientController extends Controller
{

    public function index()
    {
      $client = Client::all();
      return view('admin.client.list_client',compact('client'));
    }

    public function create()
    {
        $b = Branch::where('unused',0)->pluck('name','id');
       return view('admin.client.create',compact('b'));
    }

    public function store(Request $request)
    {
        if($request->ajax()){
           $date = time() - strtotime($request->dob);
           $age = floor($date/31536000);
           $c = new Client();
           $c->branch_id  = $request->branch_id;
           $c->register   = Carbon::now()->toDateString();
           $c->khname     = trim($request->khname);
           $c->engname    = trim($request->engname);
           $c->gender     = $request->gender;
           $c->email      = trim($request->email);
           $c->tel        = trim($request->tel);
           $c->age        = $age;
           $c->dob        = $request->dob;
           $c->occ        = trim($request->occ);
           $c->addr       = trim($request->addr);
           $c->user_id    = Auth::user()->id;
           $c->active     = 1;
           $c->save();
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $b = Branch::where('unused',0)->pluck('name','id');
        $c = Client::find($id);
        return view('admin.client.edit',compact('b','c'));
    }

    public function update(Request $request, $id)
    {
        $date = time() - strtotime($request->dob);
        $age = floor($date/31536000);
        $change =[];
        $c = Client::find($id);

        if($c->branch_id==$request->input('branch_id')){
           $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->khname==trim($request->input('khname'))){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->engname==trim($request->input('engname'))){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->gender==$request->input('gender')){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->email==trim($request->input('email'))){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->tel==trim($request->input('tel'))){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->age==$age){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->dob==trim($request->input('dob'))){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->occ==trim($request->input('occ'))){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if($c->addr==trim($request->input('addr'))){
            $change[]="no";
        }else{
            $change[]="yes";
        }
        if(in_array('yes',$change)){
           $ch = new Clienthis();
           $ch->client_id  = $id;
           $ch->branch_id  = $c->branch_id;
           $ch->register   = $c->register;
           $ch->khname     = $c->khname;
           $ch->engname    = $c->engname;
           $ch->gender     = $c->gender;
           $ch->email      = $c->email;
           $ch->tel        = $c->tel;
           $ch->age        = $c->age;
           $ch->dob        = $c->dob;
           $ch->occ        = $c->occ;
           $ch->addr       = $c->addr;
           $ch->user_id    = $c->user_id;
           $ch->active     = $c->active;
           $ch->save();
        }
        $c->branch_id = $request->input('branch_id');
        $c->khname  = trim($request->input('khname'));
        $c->engname = trim($request->input('engname'));
        $c->gender  = $request->input('gender');
        $c->email   = trim($request->input('email'));
        $c->tel     = trim($request->input('tel'));
        $c->age     = $age;
        $c->dob     = trim($request->input('dob'));
        $c->occ     = trim($request->input('occ'));
        $c->addr    = trim($request->input('addr'));
        $c->save();
        return redirect()->back();
    }


    public function destroy($id)
    {

    }

    public function turnOn($id){
        $c = Client::find($id);
        $c->active = 1;
        $c->save();
    }
    public function turnOff($id){
        $c = Client::find($id);
        $c->active = 0;
        $c->save();
    }




}
