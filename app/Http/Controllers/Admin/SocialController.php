<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Social\SocialRequest;
use App\Http\Requests\Social\SocialUpdateRequest;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(){
      $Social=  Social::all();
      return view('dashboard.social.index',compact('Social'));
    }
    public function store(SocialRequest $request){
     $Data=   $request->validated();
     Social::create($Data);
     return redirect()->back();


    }
    public function update(SocialUpdateRequest $request,$id){
        $Social=Social::findorFail($id);
        $Data=   $request->validated();
        $Social->update($Data);
        return redirect()->back();
    }
public function destroy($id){
        Social::destroy($id);
        return redirect()->back();
}


}
