<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class prescriptionController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.prescription.create');
    }


    public function store(Request $request)
    {
       echo "working.....";
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
        //
    }


    public function destroy($id)
    {
        //
    }
}
