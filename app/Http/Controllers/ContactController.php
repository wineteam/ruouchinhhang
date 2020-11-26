<?php

namespace App\Http\Controllers;

use App\Mail\contactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('client.contact');
    }

  public function sendMail(Request $request)
  {
      $details = [
        'name'=>$request->name,
        'email'=>$request->email,
        'message'=>$request->message
      ];

      Mail::to('hoaianh0123450@gmail.com')->send(new contactForm($details));
      if (count(Mail::failures()) > 0){
        return redirect()->route('contact')->withError('Hien tai khong the gui mail. Vui long thu lai sau!');
      }
      return redirect()->back()->with('message','Cam on phan hoi cua ban');
  }
}
