<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request) {
        $data = $request->input();
        $attachment = [];
        if($files = $request->allFiles()) {
            foreach ($files AS $key => $val) {
                if ($image = $request->file($key)) {
                    $destinationPath = public_path('images/form/');
                    $profileImage = $key.'-'.date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    $attachment[$key] = "$profileImage";
                }
            }
        }
        $msg = json_encode(['msg'=>$data, 'attachment'=>$attachment]);
        $cnt = Contact::create(['title'=>'Contact Form Mail', 'message'=>$msg]);
        $mail = get_setting('contact_email');
        $mail = Mail::to($mail)->send(new ContactFormMail($data, $attachment));
        if ($mail) {
            $cnt->update(['status'=>'1']);
            return redirect()->back()->with('success', 'Contact form submited successfully!');
        } else {
            return redirect()->back()->with('error', 'There were some problems with your input!');
        }
    }
}
