<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\GalleryCategoryRequest;
use App\Http\Requests\Gallery\GalleryCategoryUpdateRequest;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryCategoryController extends Controller
{
    public function index(){
        $PhotoCate=GalleryCategory::all();
        return view('dashboard.galleryCategory.index',compact('PhotoCate'));
    }
    public function store(GalleryCategoryRequest $request){
        $data=$request->validated();
        if ($data['image'] != ''){
            $path=Storage::disk('public')->putFile('/GalleryCategory',$request->image);
            $data['image']=$path;
        }

        GalleryCategory::create($data);
        if (app()->getLocale()=='ar'){
            $message=' تم الاضافة بنجاح';

        }
        else{
            $message='Added successfully ';
        };


        return redirect()->back()->with('message', $message);
    }
    public function update(GalleryCategoryUpdateRequest $request, $id){
        $gallerycategoryUpdate= GalleryCategory::findorFail($id);
        $data=$request->validated();
        if ($request->has('image')){
            $path=Storage::disk('public')->putFile('/GalleryCategory',$request->image);
            $data['image']=$path;
        }



        $gallerycategoryUpdate->update($data);


        if (app()->getLocale()=='ar'){
            $message=' تم التعديل بنجاح';

        }
        else{
            $message='Edited successfully  ';
        };


        return redirect()->back()->with('message', $message);

    }
    public function destroy($id){
        GalleryCategory::destroy($id);
        if (app()->getLocale()=='ar'){
            $message=' تم الحذف بنجاح';

        }
        else{
            $message='Deleted  successfully  ';
        };


        return redirect()->back()->with('message', $message);
    }
}
