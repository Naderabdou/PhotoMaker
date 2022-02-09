<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\Social;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $social=Social::latest()->first();
       $Gallery= GalleryCategory::all();

        return view('Theme.gallery',compact('social','Gallery'));
    }
    public function show($id){
        $gallery= GalleryCategory::findorFail($id);
        return view('Theme.photo',compact('gallery'));
    }
}
