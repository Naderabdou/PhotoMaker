<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(){
      $social=  Social::all();
      return view('dashboard.social.index',compact('social'));
    }
    public function store(Request $request){
     $data=   $request->validate([
            'facebook_url' => 'required|url',
            'twitter_url' => 'required|url',
            'github_url' => 'required|url'
        ]);
     Social::create($data);
     return redirect()->back();


    }
    public function update(Request $request,$id){
        $social=Social::findorFail($id);
        $data=   $request->validate([
            'facebook_url' => 'required|url',
            'twitter_url' => 'required|url',
            'github_url' => 'required|url'
        ]);
        $social->update($data);
        return redirect()->back();
    }
public function show($id){
        Social::destroy($id);
        return redirect()->back();
}


}
