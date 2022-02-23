<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ServicesCatgory;
use App\Models\ServicesContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $category=ServicesCatgory::with('Services')->get();

        return view('Theme.contact',compact('category'));
    }
}
