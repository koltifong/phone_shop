<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
// use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function createForm(Request $request) {
        return view('frontend.contact');
      }
      // Store Contact Form data
      public function ContactUsForm(Request $request) {
          // Form validation
          $this->validate($request, [
              'name' => 'required',
              'email' => 'required|email',
              'message' => 'required'
           ]);
          //  Store data in database
          Contact::create($request->all());
        //   //  Send mail to admin
        //   Mail::send('mail', array(
        //       'name' => $request->get('name'),
        //       'email' => $request->get('email'),
        //       'user_query' => $request->get('message'),
        //   ), function($message) use ($request){
        //       $message->from($request->email);
        //       $message->to('tifongkol@gmail.com', 'Admin')->subject($request->get('subject'));
        //   });
  
        //   return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
          return redirect()->back()->withSuccess('success', 'We have received your message and would like to thank you for writing to us.');
      }  
}
