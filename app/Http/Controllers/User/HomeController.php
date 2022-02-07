<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(){
       return view('Theme.index');
    }
    public function lang(Request $request,$locale)
    {

session(['APP_LOCALE'=>$locale]);
        return redirect()->back();

    }
}
