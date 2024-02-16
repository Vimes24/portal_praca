<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index ()
    {
        if(Auth::guard('candidate')->check()) {
            return redirect()->route('candidate_dashboard');
        }

        if(Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        }

        $other_page_item = PageOtherItem::where('id',1)->first();
        return view('front.login', compact('other_page_item'));
    }

    public function company_login_submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ];

        //Przy podaniu poprawnych danych zapisuje dane na stronie i przenosi na stronę główną panelu instytucji
        if(Auth::guard('company')->attempt($credential))
        {
            return redirect()->route('company_dashboard');
        }
        else
        {
            return redirect()->route('login')->with('error', 'Podano niepoprawne dane!');
        }
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login');
    }

    public function candidate_login_submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ];

        //Przy podaniu poprawnych danych zapisuje dane na stronie i przenosi na stronę główną panelu kandydata
        if(Auth::guard('candidate')->attempt($credential))
        {
            return redirect()->route('candidate_dashboard');
        }
        else
        {
            return redirect()->route('login')->with('error', 'Podano niepoprawne dane!');
        }
    }

    public function candidate_logout()
    {
        Auth::guard('candidate')->logout();
        return redirect()->route('login');
    }
}
