<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::where('active',1)->get();
        return view('admin.products.index',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::where('active',1)->pluck('name','id');
        $bra = Branch::pluck('name','id');
        return view('admin.products.create',compact('cat','bra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $this->validate($request,[
            'khName'       =>'required',
            'enName'        => 'required',
            'category_id'   => 'required'
        ],[
            'khName.required' =>'Khmer name required',
            'enName.required' =>'English name required',
            'category_id.required' =>'Category name required'
        ]);

        $pro = new Product();
        $pro->khName = trim($request->input('khName'));
        $pro->enName = trim($request->input('enName'));
        if($request->input('category_id')!=null){
            $pro->category_id = trim($request->input('category_id'));
        }else{
            $pro->category_id =0;
        }
        if($request->input('branch_id')!=null){
            $pro->branch_id = trim($request->input('branch_id'));
        }else{
            $pro->branch_id =0;
        }
        $pro->user_id = Auth::user()->id;
        $pro->qty = 0;
        $pro->active = 1;
        $pro->save();
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
        $product = Product::find($id);
        $cat = Category::where('active',1)->pluck('name','id');
        $bra = Branch::pluck('name','id');
        return view('admin.products.edit',compact('cat','bra','product'));
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
            'khName'       =>'required',
            'enName'        => 'required',
            'category_id'   => 'required'
        ],[
            'khName.required' =>'Khmer name required',
            'enName.required' =>'English name required',
            'category_id.required' =>'Category name required'
        ]);
        $pro = Product::find($id);
        $pro->khName = trim($request->input('khName'));
        $pro->enName = trim($request->input('enName'));
        if($request->input('category_id')!=null){
            $pro->category_id = trim($request->input('category_id'));
        }else{
            $pro->category_id =0;
        }
        if($request->input('branch_id')!=null){
            $pro->branch_id = trim($request->input('branch_id'));
        }else{
            $pro->branch_id =0;
        }
        $pro->user_id = Auth::user()->id;
        $pro->save();
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
        $pro = Product::find($id);
        $pro->active = 0;
        $pro->save();
        return redirect()->back();
    }
}
