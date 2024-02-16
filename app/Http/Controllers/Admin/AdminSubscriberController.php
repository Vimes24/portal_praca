<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AdminSubscriberController extends Controller
{
    public function all_subscribers()
    {
        $subscribers = Subscriber::where('status',1)->get();
        return view('admin.all_subscribers', compact('subscribers'));
    }

    public function send_email()
    {
        return view('admin.subscribers_send_email');
    }
    
    public function send_email_submit(Request $request) 
    {
        $request->validate([
            'subject' => 'required',
            'comment' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->comment;

        $all_subs = Subscriber::where('status',1)->get();
        foreach($all_subs as $item)
        {
            Mail::to($item->email)->send(new Websitemail($subject,$message));
        }        

        return redirect()->back()->with('success','Wiadomość została wysłana do wszystkich subskrybujących.');

    }

    public function delete($id)
    {
        Subscriber::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Pomyślnie usunięto informacje.');
    }
}
