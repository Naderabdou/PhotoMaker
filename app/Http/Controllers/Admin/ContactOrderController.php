<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\OrederContactRequest;
use App\Models\Contact;
use App\Models\ServicesCatgory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactOrderController extends Controller
{
    public function index()
    {
        $contact = Contact::with('ordercontact')->get();

        return view('dashboard.contact.order',compact('contact'));
    }}

