<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\PhotoGalleryRequest;
use App\Http\Requests\Gallery\PhotoGalleryUpdateRequest;
use App\Models\GalleryCategory;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    public function index(){
       $photo= PhotoGallery::all();
       if (app()->getLocale()=='ar'){
           $categories=GalleryCategory::pluck('ar_name','id');

       }else{
           $categories=GalleryCategory::pluck('en_name','id');

       }

        return view('dashboard.PhotoGallery.index',compact('photo','categories'));
    }
    public function store(PhotoGalleryRequest $request){
        $data=$request->validated();
        if ($data['image'] != ''){
            $path=Storage::disk('public')->putFile('/GalleryCategory',$request->image);
            $data['image']=$path;
        }
        PhotoGallery::create($data);
        if (app()->getLocale()=='ar'){
            $message=' تم الاضافة بنجاح';

        }
        else{
            $message='Added successfully ';
        };


        return redirect()->back()->with('message', $message);
    }
    public function update(PhotoGalleryUpdateRequest $request,$id){
        $photo=PhotoGallery::findorFail($id);
         $data=$request->validated();
        if ($request->has('image')){
            $path=Storage::disk('public')->putFile('/GalleryCategory',$request->image);
            $data['image']=$path;
        }
        $photo->update($data);
        if (app()->getLocale()=='ar'){
            $message=' تم التعديل بنجاح';

        }
        else{
            $message='Edited successfully  ';
        };


        return redirect()->back()->with('message', $message);
    }
    public function destroy($id){
        PhotoGallery::destroy($id);
        if (app()->getLocale()=='ar'){
            $message=' تم الحذف بنجاح';

        }
        else{
            $message='Deleted  successfully  ';
        };


        return redirect()->back()->with('message', $message);
    }
}
