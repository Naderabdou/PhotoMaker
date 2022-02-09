<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\ServicesRequest;
use App\Http\Requests\Services\ServicesUpdateRequest;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $Service=Services::all();
        return view('dashboard.Services.index',compact('Service'));
    }
    public function store(ServicesRequest $request){
        $Data=$request->validated();
        Services::create($Data);
        return redirect()->back();
    }
    public function update(ServicesUpdateRequest $request,$id){
        $Service=Services::findorFail($id);
        $Data=$request->validated();
        $Service->update($Data);
        return redirect()->back();
    }
    public function destroy($id){
        Services::destroy($id);
        return redirect()->back();
    }

}
