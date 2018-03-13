<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Pricelist;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pri = Pricelist::where('active',1)->get();
        return view('admin.pricelists.index',compact('pri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = Branch::pluck('name','id');
        $pro = Product::where('active',1)->pluck('khname','id');
        return view('admin.pricelists.create',compact('pro','branch'));
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
            'product_id'       =>'required',
            'branch_id'       =>'required',
            'fobPrice'       =>'required',
            'margin'       =>'required',
            'landingPrice'       =>'required',
            'sellingPrice'       =>'required',
            'beginDate'       =>'required',
            'endDate'       =>'required'
        ],[
            'product_id.required' =>'Product name required',
            'branch_id.required' =>'Branch name required',
            'fobPrice.required' =>'FOB price required',
            'margin.required' =>'Margin required',
            'landingPrice.required' =>'Langing price required',
            'sellingPrice.required' =>'Selling price required',
            'beginDate.required' =>'Begin date required',
            'endDate.required' =>'End date required'
        ]);

        $pri = new Pricelist();
        $pri->branch_id = trim($request->input('branch_id'));
        $pri->product_id = trim($request->input('product_id'));
        $pri->fobPrice = trim($request->input('fobPrice'));
        $pri->margin = trim($request->input('margin'));
        $pri->landingPrice = trim($request->input('landingPrice'));
        $pri->sellingPrice = trim($request->input('sellingPrice'));
        $pri->beginDate = trim($request->input('beginDate'));
        $pri->endDate = trim($request->input('endDate'));
        $pri->user_id = Auth::user()->id;
        $pri->active = 1;
        $pri->save();
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
        $pri = Pricelist::find($id);
        $branch = Branch::pluck('name','id');
        $pro = Product::where('active',1)->pluck('khname','id');
        return view('admin.pricelists.edit',compact('pri','branch','pro'));
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
            'product_id'       =>'required',
            'product_id'       =>'required',
            'fobPrice'       =>'required',
            'margin'       =>'required',
            'landingPrice'       =>'required',
            'sellingPrice'       =>'required',
            'beginDate'       =>'required',
            'endDate'       =>'required'
        ],[
            'product_id.required' =>'Product name required',
            'branch_id.required' =>'Branch name required',
            'fobPrice.required' =>'FOB price required',
            'margin.required' =>'Margin required',
            'landingPrice.required' =>'Langing price required',
            'sellingPrice.required' =>'Selling price required',
            'beginDate.required' =>'Begin date required',
            'endDate.required' =>'End date required'
        ]);

        $pri = Pricelist::find($id);
        $pri->branch_id = trim($request->input('branch_id'));
        $pri->product_id = trim($request->input('product_id'));
        $pri->fobPrice = trim($request->input('fobPrice'));
        $pri->margin = trim($request->input('margin'));
        $pri->landingPrice = trim($request->input('landingPrice'));
        $pri->sellingPrice = trim($request->input('sellingPrice'));
        $pri->beginDate = trim($request->input('beginDate'));
        $pri->endDate = trim($request->input('endDate'));
        $pri->user_id = Auth::user()->id;
        $pri->save();
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
        $pri = Pricelist::find($id);
        $pri->active = 0;
        $pri->save();
    }
}
