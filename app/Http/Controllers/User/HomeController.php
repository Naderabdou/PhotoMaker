<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(){
        $social=Social::latest()->first();
       return view('Theme.index',compact('social'));
    }


}
