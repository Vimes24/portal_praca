<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\PageContactItem;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index () 
    {
        $contact_page_item = PageContactItem::where('id',1)->first();
        return view('front.contact', compact('contact_page_item'));
    }

    public function submit (Request $request)
    {
        $admin_data = Admin::where('id', 1)->first();

        $request->validate([
            'person_name' => 'required',
            'person_email' => 'required|email',
            'person_message' => 'required'
        ]);

        $subject = 'Prośba o kontakt';
        $message = 'Dane kontaktowe: <br>';
        $message .= 'Imię: '.$request->person_name.'<br>';
        $message .= 'Email: '.$request->person_email.'<br>';
        $message .= 'Wiadomość: '.$request->person_message.'<br>';

        Mail::to($admin_data->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Pomyślnie wysłano email. Wkrótce się z Tobą skontaktujemy.');
    }
}
