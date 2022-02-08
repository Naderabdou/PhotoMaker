<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $Service=Services::all();
        return view('dashboard.Services.index',compact('Service'));
    }
    public function store(Request $request){
        $data=$request->validate([
            'title_ar'=>'string|required',
            'title_en'=>'string|required',
            'desc_ar'=>'string|required',
            'desc_en'=>'string|required'
        ]);
        Services::create($data);
        return redirect()->back();
    }
    public function update(Request $request,$id){
        $Service=Services::findorFail($id);
        $data=$request->validate([
            'title_ar'=>'string|required',
            'title_en'=>'string|required',
            'desc_ar'=>'string|required',
            'desc_en'=>'string|required'
        ]);
        $Service->update($data);
        return redirect()->back();
    }
    public function show($id){
        Services::destroy($id);
        return redirect()->back();
    }

}
