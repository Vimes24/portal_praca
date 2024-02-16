<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use App\Models\Company;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function index ()
    {
        $other_page_item = PageOtherItem::where('id',1)->first();
        return view('front.signup', compact('other_page_item'));
    }

    public function company_signup_submit (Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $token = hash('sha256', time());

        $obj = new Company();
        $obj->company_name = $request->company_name;
        $obj->person_name = $request->person_name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $verify_link = url('company-signup-verify/'.$token.'/'.$request->email);
        $subject = 'Link weryfikacyjny dla Instytucji';
        $message = 'Kliknij w poniższy link: <br>';
        $message .= '<a href="'.$verify_link.'">Kliknij</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success', 'Email został wysłany na twoją skrzynkę pocztową. Sprawdź i potwierdź rejestrację poprzez wejście w otrzymany link.');

    }

    public function company_signup_verify ($token, $email)
    {
        $company_data = Company::where('token', $token)->where('email', $email)->first();
        if (!$company_data) {
            return redirect()->route('login');
        }

        $company_data->token = '';
        $company_data->status = 1;
        $company_data->update();

        return redirect()->route('login')->with('success', 'Email został zweryfikowany. Możesz się zalogować do portalu.');
    }

    public function candidate_signup_submit (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:candidates',
            'email' => 'required|email|unique:candidates',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $token = hash('sha256', time());

        $obj = new Candidate();
        $obj->name = $request->name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $verify_link = url('candidate-signup-verify/'.$token.'/'.$request->email);
        $subject = 'Link weryfikacyjny dla Kandydata';
        $message = 'Kliknij w poniższy link: <br>';
        $message .= '<a href="'.$verify_link.'">Kliknij</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success', 'Email został wysłany na twoją skrzynkę pocztową. Sprawdź i potwierdź rejestrację poprzez wejście w otrzymany link.');

    }

    public function candidate_signup_verify ($token, $email)
    {
        $candidate_data = Candidate::where('token', $token)->where('email', $email)->first();
        if (!$candidate_data) {
            return redirect()->route('login');
        }

        $candidate_data->token = '';
        $candidate_data->status = 1;
        $candidate_data->update();

        return redirect()->route('login')->with('success', 'Email został zweryfikowany. Możesz się zalogować do portalu.');
    }
}
