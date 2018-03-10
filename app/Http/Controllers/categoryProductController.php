<?php

namespace App\Http\Controllers;

use App\Categoryproduct;
use App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class categoryProductController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
       $lang = Language::pluck('name','id');
       return view('admin.categoryproduct.create',compact('lang'));
    }

    public function store(Request $request)
    {
        if($request->ajax()){
           $catPro_id = 0;
           $language_id = $request->language_id;

            if($request->session()->has('Language')){
                $getLanguage = $request->session()->get('Language');
                $request->session()->forget('Language');
                $request->session()->put('Language',$getLanguage+[$language_id=>$language_id]);
            }else{
                $request->session()->put('Language',[$language_id=>$language_id]);
            }

            if($request->session()->has('categoryproduct_id')){
                $cat = $request->session()->get('categoryproduct_id');
                $catPro_id = $cat['categoryProduct'];
            }

            $languageID = $request->session()->get('Language');
            $language   = Language::whereNotIn('id',$languageID)->get();

            if(count($language)){
                $language = Language::whereNotIn('id',$languageID)->pluck('name','id');
            }else{
                $request->session()->forget('Language');
                $request->session()->forget('categoryproduct_id');
                $language = Language::pluck('name','id');
            }

            $categoryProdcut = Categoryproduct::where('id',$catPro_id)->get();
            if(count($categoryProdcut)){
                DB::table('categoryproduct_language')->insert(['language_id'=>$language_id,'categoryproduct_id'=>$catPro_id,'name'=>$request->name]);
            }else{
                $catPro = new Categoryproduct();
                if($request->parent_num){
                    $catPro->parent = $request->parent_num;
                }
                $catPro->date = Carbon::now()->toDateString();
                if ($request->publish=='on'){
                    $catPro->publish =1;
                }else{
                    $catPro->publish =0;
                }
                $catPro->trash =0;
                $catPro->user_id = Auth::user()->id;
                $catPro->user_modify =0;
                $catPro->save();
                $id = $catPro->id;
                $catPro->languages()->attach($language_id,['name'=>$request->name]);
                $request->session()->put('categoryproduct_id',['categoryProduct'=>$id]);
            }
            return response()->json(['language'=>$language]);
        }
    }


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
