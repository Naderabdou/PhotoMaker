<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Social;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $social=Social::latest()->first();
     $Service=  Services::all();
        return view('Theme.services',compact('social','Service'));
    }
}
