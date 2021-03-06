<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\AboutRequest;
use App\Http\Requests\About\AboutUpdateRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(){
        $about=About::all();
        return view('dashboard.about.index',compact('about'));
    }
    public function store(AboutRequest $request){
        $data=$request->validated();


        if ($data['client_img'] != ''){
            $path=Storage::disk('public')->putFile('/About',$request->client_img);
            $data['client_img']=$path;
        }
        About::create($data);
        if (app()->getLocale()=='ar'){
            $message=' تم الاضافة بنجاح';

        }
        else{
            $message='Added successfully ';
        };


        return redirect()->back()->with('message', $message);


    }
    public function update(AboutUpdateRequest $request,$id){
        $about=About::findorFail($id);
        $data=$request->validated();

        if ($request->has('client_img')){
            $path=Storage::disk('public')->putFile('/About',$request->client_img);
            $data['client_img']=$path;
        }
        $about->update($data);
        if (app()->getLocale()=='ar'){
            $message=' تم التعديل بنجاح';

        }
        else{
            $message='Edited successfully  ';
        };


        return redirect()->back()->with('message', $message);
    }
    public function destroy($id){
        About::destroy($id);
        if (app()->getLocale()=='ar'){
            $message=' تم الحذف بنجاح';

        }
        else{
            $message='Deleted  successfully  ';
        };


        return redirect()->back()->with('message', $message);
    }
}
