<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Social;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $AboutAdmin=About::all();

        return view('Theme.About_us',compact('AboutAdmin'));
    }
}
