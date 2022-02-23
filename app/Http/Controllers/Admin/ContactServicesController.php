<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\ServicesCategoryRequest;
use App\Http\Requests\contact\ServicesContactRequest;
use App\Http\Requests\contact\ServicesContactUpdateRequest;
use App\Models\ContactServices;
use App\Models\GalleryCategory;
use App\Models\ServicesCatgory;
use App\Models\ServicesContact;
use Illuminate\Http\Request;
use function Symfony\Component\String\u;

class ContactServicesController extends Controller
{
   public function index(){
       $contact=ServicesContact::all();
       if (app()->getLocale()=='ar'){
           $categories=ServicesCatgory::pluck('name_ar','id');

       }else{
           $categories=ServicesCatgory::pluck('name_en','id');

       }
       return view('dashboard.contact.index',compact('contact','categories'));
   }
   public function store(ServicesContactRequest $request){
       $alldata=[];
       $data=$request->validated();

       for ($i=0; $i<count($data['name_ar']); $i++){
           array_push($alldata,['name_ar'=>$data['name_ar'][$i],'name_en'=>$data['name_en'][$i],'contact_id'=>$data['contact_id']]);
       }


      // $data=$request->validated();



       $service=  ServicesContact::insert(
           $alldata);


       if (app()->getLocale()=='ar'){
           $message=' تم الاضافة بنجاح';

       }
       else{
           $message='Added successfully ';
       };


       return redirect()->back()->with('message', $message);
   }
   public function destroy($id){
       ServicesContact::destroy($id);
       if (app()->getLocale()=='ar'){
           $message=' تم الحذف بنجاح';

       }
       else{
           $message='Deleted  successfully  ';
       };


       return redirect()->back()->with('message', $message);
   }
   public function update(ServicesContactUpdateRequest $request ,$id){
       $update=ServicesContact::findorFail($id);


       $data=$request->validated();

       $update->update([
           'name_ar'=>$data['name_ar'][0],
           'name_en'=>$data['name_en'][0],
           'contact_id'=>$data['contact_id']
       ]);
       if (app()->getLocale()=='ar'){
           $message=' تم التعديل بنجاح';

       }
       else{
           $message='Edited successfully  ';
       };


       return redirect()->back()->with('message', $message);

   }

}
