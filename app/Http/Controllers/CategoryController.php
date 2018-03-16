<?php

namespace App\Http\Controllers;

use App\Category;
<<<<<<< HEAD
use App\Categoryproduct;
use App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
=======
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $locale = Lang::locale();
        $l = Language::where('code',$locale)->value('id');
        $lang = Language::find($l);
        $category = $lang->categories()->where('trash',0)->get();
        return view('admin.categories.index',compact('category','l'));
=======
        $cat = Category::where('active',1)->get();
        return view('admin.categories.index',compact('cat'));
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
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
=======
        $cat = Category::where('active',1)->pluck('name','id');
        return view('admin.categories.create',compact('cat'));
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
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
        if($request->ajax()) {
            if (!count($check)) {
                $cat = new Category();
                $cat->date = Carbon::now()->toDateString();
                $cat->parent = $request->parent;

                if ($request->publish == 1) {
                    $cat->publish = $request->publish;
                } else {
                    $cat->publish = 0;
                }
                $cat->trash = 0;
                $cat->user_added = Auth::user()->id;
                $cat->user_modifies = 0;
                $cat->save();
                $id = $cat->id;
                $request->session()->put('category_id', [$id => $id]);
                $cat->languages()->attach($request->language_id, ['name' => $request->name]);
                return response()->json(['id' => 0, 'language' => $language]);
            } else {
                DB::table('category_language')->insert(['language_id' => $request->language_id, 'category_id' => $id, 'name' => $request->name]);
                if (!$request->session()->has('langId')) {
                    $id = 0;
                }
                return response()->json(['id' => 0, 'language' => $language]);
            }
        }
    }
//
=======
        $this->validate($request,[
            'name'       =>'required'
        ],[
            'name.required' =>'Category name required'
        ]);

        $cat = new Category();
        $cat->name = trim($request->input('name'));
        $cat->parent = trim($request->input('parent'));
        $cat->description = trim($request->input('description'));
        $cat->user_id = Auth::user()->id;
        $cat->active = 1;
        $cat->save();
    }

>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
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
<<<<<<< HEAD
    public function edit($id,$langId)
    {
        $l = Language::find($langId);
        $data = $l->categories()->where('category_id',$id)->get();
        $parent = $l->categories()->where('trash',0)->pluck('name','category_id');
        return view('admin.categories.edit',compact('data','parent'));
=======
    public function edit($id)
    {
        $cat = Category::find($id);
        $c = Category::where('active',1)->pluck('name','id');
        return view('admin.categories.edit',compact('cat','c'));
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
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
<<<<<<< HEAD
        $cate = Category::find($id);
        if($request->parent_num) {
            $cate->parent = $request->parent_num;
        }else{
            $cate->parent = 0;
        }
        if ($request->publishedit=='on'){
            $cate->publish = 1;
        }else{
            $cate->publish = 0;
        }
        $cate->save();
        DB::table('category_language')->where('id',$request->pivotId)->update(['name'=>$request->name]);
=======
        $this->validate($request,[
            'name'       =>'required'
        ],[
            'name.required' =>'Category name required'
        ]);

        $cat = Category::find($id);
        $cat->name = $request->input('name');
        $cat->parent = trim($request->input('parent'));
        $cat->description = $request->input('description');
        $cat->user_id = Auth::user()->id;
        $cat->save();
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
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
        $cat = Category::find($id);
<<<<<<< HEAD
        $cat->trash = 0;
        $cat->save();
    }
    public function getSelectParent()
    {
        $locale = Lang::locale();
        $l = Language::where('code',$locale)->value('id');
        $lang = Language::find($l);
        $category = $lang->categories()->pluck('name','categories.id');
        return response()->json($category);
    }
    public function selectParent($id)
    {
        $lang = Language::find($id);
        $category = $lang->categories()->pluck('name','categories.id');
        return response()->json($category);
=======
        $cat->active = 0;
        $cat->save();
        return redirect()->back();
    }
    public function getSelectParent()
    {
        $s = Category::where('active',1)->get();
        return response()->json($s);
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
    }
}
