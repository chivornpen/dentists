<?php

namespace App\Http\Controllers;

use App\Category;
use App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cat = Category::all();
        return view('admin.categories.index',compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = Lang::locale();
        $lang=[];
        if(Session::has('langId')){
            $lang = Session::get('langId');
        }
        $language = Language::whereNotIn('id',$lang)->where('active',1)->pluck('name','id');
        $l = Language::where('code',$locale)->value('id');
        $lang = Language::find($l);
        $category = $lang->categories()->pluck('name','categories.id');
        return view('admin.categories.create',compact('language','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array_one[$request->language_id]=$request->language_id;
        if($request->session()->has('langId')){
            $lang = $request->session()->get('langId');
            $request->session()->forget('langId');
            $request->session()->put('langId',$lang+$array_one);
        }else{
            $request->session()->put('langId',$array_one);
        }

        $id =0;
        if($request->session()->has('category_id')){
            $categ = $request->session()->get('category_id');
            foreach ($categ as $c){
                $id = $c;
            }
        }

        $array_lang = $request->session()->get('langId');
        $language = Language::whereNotIn('id',$array_lang)->pluck('name','id');
        if(!count($language)){
            $request->session()->forget('langId');
            $request->session()->forget('category_id');
            $language = Language::pluck('name','id');
        }
        $check = Category::where('id',$id)->get();
        if($request->ajax()){
            if(!count($check)){
                $cat = new Category();
                $cat->date    =  Carbon::now()->toDateString();
                $cat->parent=$request->parent;
                if($request->publish==1){
                    $cat->publish    =  $request->publish;
                }else{
                    $cat->publish = 0;
                }
                $cat->trash   = 0;
                $cat->user_added   = Auth::user()->id;
                $cat->user_modifies   = 0;
                $cat->save();
                $id = $cat->id;
                $request->session()->put('category_id',[$id=>$id]);
                $cat->languages()->attach($request->language_id,['name'=>$request->name]);
                return response()->json(['id'=>0,'language'=>$language]);
            }else{
                DB::table('category_language')->insert(['language_id'=>$request->language_id,'category_id'=>$id,'name'=>$request->name]);
                if(!$request->session()->has('langId')){
                    $id = 0;
                }
                return response()->json(['id'=>0,'language'=>$language]);
            }


       }
    }
//
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
    public function getSelectParent()
    {
        $locale = Lang::locale();
        $l = Language::where('code',$locale)->value('id');
        $lang = Language::find($l);
        $category = $lang->categories()->pluck('name','categories.id');
        return response()->json($category);
    }
    public function getSelectLanguage($id)
    {
//        $lang = Language::whereNotIn('id')
//        $category = $lang->categories()->pluck('name','categories.id');
//        return response()->json($category);
    }
}
