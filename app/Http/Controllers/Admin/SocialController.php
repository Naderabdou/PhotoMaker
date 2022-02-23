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
        if (app()->getLocale()=='ar'){
            $message=' تم الاضافة بنجاح';

        }
        else{
            $message='Added successfully ';
        };


        return redirect()->back()->with('message', $message);


    }
    public function update(SocialUpdateRequest $request,$id){
        $Social=Social::findorFail($id);
        $Data=   $request->validated();
        $Social->update($Data);
        if (app()->getLocale()=='ar'){
            $message=' تم التعديل بنجاح';

        }
        else{
            $message='Edited successfully  ';
        };


        return redirect()->back()->with('message', $message);
    }
public function destroy($id){
        Social::destroy($id);
    if (app()->getLocale()=='ar'){
        $message=' تم الحذف بنجاح';

    }
    else{
        $message='Deleted  successfully  ';
    };


    return redirect()->back()->with('message', $message);
}


}
