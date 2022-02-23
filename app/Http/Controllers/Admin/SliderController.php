<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(){
        $slider=Slider::get();
        return view('dashboard.slider.index',compact('slider'));
    }
    public function store(Request $request){
        $data=$request->validate([
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($data['img'] != ''){
            $path=Storage::disk('public')->putFile('/slider',$request->img);
            $data['img']=$path;
        }
        Slider::create($data);

        if (app()->getLocale()=='ar'){
            $message=' تم الاضافة بنجاح';

        }
        else{
            $message='Added successfully ';
        };


        return redirect()->back()->with('message', $message);

    }
    public function update(Request $request,$id){
        $slider=Slider::findorFail($id);
        $data=$request->validate([
            'img'=>'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if ($request->has('img')){
            $path=Storage::disk('public')->putFile('/GalleryCategory',$request->img);
            $data['img']=$path;
        }
        $slider->update($data);
        if (app()->getLocale()=='ar'){
            $message=' تم التعديل بنجاح';

        }
        else{
            $message='Edited successfully  ';
        };


        return redirect()->back()->with('message', $message);

    }
    public function destroy($id){
        Slider::destroy($id);
        if (app()->getLocale()=='ar'){
            $message=' تم الحذف بنجاح';

        }
        else{
            $message='Deleted  successfully  ';
        };


        return redirect()->back()->with('message', $message);
    }

}
