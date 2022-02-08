<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(){
        $About=About::all();
        return view('dashboard.about.index',compact('About'));
    }
    public function store(Request $request){
        $data=$request->validate([
            'about_desc_ar'=>'string',
            'about_desc_en'=>'string',
            'client_title'=>'string',
            'client_img'=>'image|mimes:jpeg,png,jpg,gif,svg'

        ]);
        if ($data['client_img'] != ''){
            $path=Storage::disk('public')->putFile('/About',$request->client_img);
            $data['client_img']=$path;
        }
        About::create($data);
        return redirect()->back();


    }
    public function update(Request $request,$id){
        $About=About::findorFail($id);
        $data=$request->validate([
            'about_desc_ar'=>'string',
            'about_desc_en'=>'string',
            'client_title'=>'string',
            'client_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $About->update($data);
        return redirect()->back();
    }
    public function show($id){
        About::destroy($id);
        return redirect()->back();
    }
}
