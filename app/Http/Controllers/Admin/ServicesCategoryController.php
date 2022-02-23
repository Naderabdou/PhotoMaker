<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\ServicesCategoryRequest;
use App\Http\Requests\contact\ServicesCategoryUpdateRequest;
use App\Models\ServicesCatgory;
use Illuminate\Http\Request;

class ServicesCategoryController extends Controller
{
    public function index(){
        $category=ServicesCatgory::all();
        return view('dashboard.contact.category',compact('category'));
    }
    public function store(ServicesCategoryRequest $request){
        $data=$request->validated();
        ServicesCatgory::create($data);
        if (app()->getLocale()=='ar'){
            $message=' تم الاضافة بنجاح';

        }
        else{
            $message='Added successfully ';
        };


        return redirect()->back()->with('message', $message);
    }
    public function update(ServicesCategoryUpdateRequest $request,$id){
        $category=ServicesCatgory::findorFail($id);
     $data=$request->validated();
     $category->update($data);
        if (app()->getLocale()=='ar'){
            $message=' تم التعديل بنجاح';

        }
        else{
            $message='Edited successfully  ';
        };


        return redirect()->back()->with('message', $message);

    }
    public function destroy($id){
        ServicesCatgory::destroy($id);
        if (app()->getLocale()=='ar'){
            $message=' تم الحذف بنجاح';

        }
        else{
            $message='Deleted  successfully  ';
        };


        return redirect()->back()->with('message', $message);
    }
}
