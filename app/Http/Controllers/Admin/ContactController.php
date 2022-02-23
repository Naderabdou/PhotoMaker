<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\OrederContactRequest;
use App\Models\Contact;
use App\Notifications\OrderContactNotification;
use App\Notifications\UnActiveContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;

class ContactController extends Controller
{
    public function store(OrederContactRequest $request){
        $data=$request->validated();
        $services=[];
        array_push($services,['services'=>$data['services_id']]);
        if ($data['file'] != ''){
            $path=Storage::disk('public')->putFile('/contact',$request->file);
            $data['file']=$path;
        }
        $ser=Contact::create([
            'company_name'=>$data['company_name'],
            'type'=>$data['type'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'file'=>$data['file'],
            'other'=>$data['other'],
            'photo'=>$data['photo']
        ]);
        $ser->ordercontact()->createMany($services);
        if (app()->getLocale()=='ar'){
            $message='لقد تم ارسال الرسالة بنجاح وسوف يتم الرد عليك من خلال البريد  ';

        }
        else{
            $message='The message has been sent successfully and you will be answered via email';
        };


        return redirect()->back()->with('message', $message);;

    }
    public function status(Request $request,$id){
        $status=Contact::findorFail($id);

        $status->status=$request->status;
        $status->save();
        $user=$status->email;

        if ($request->status=='active'){
            Notification::route('mail',$user)->notify(new OrderContactNotification($status));

        }else{
            Notification::route('mail',$user)->notify(new UnActiveContactNotification($status));

        }

        if (app()->getLocale()=='ar'){
            $message='لقد تم ارسال الرسالة بنجاج   ';

        }
        else{
            $message='The message has been sent successfully';
        };


        return redirect()->back()->with('message', $message);;
    }
}
