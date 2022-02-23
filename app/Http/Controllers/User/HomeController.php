<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(){
       $slider=Slider::get();
       return view('Theme.index',compact('slider'));
    }


}
