<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(){
        $social=Social::first();
       return view('Theme.index',compact('social'));
    }
    public function lang(Request $request,$locale)
    {

session(['APP_LOCALE'=>$locale]);
        return redirect()->back();

    }

}
