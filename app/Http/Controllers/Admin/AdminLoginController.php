<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function forget_password()
    {
        return view('admin.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        //Jeżeli nie znajdzie adresu w bazie zwróci wiadomość z błędem
        $admin_data = Admin::where('email', $request->email)->first();
        if(!$admin_data){
            return redirect()->back()->with('error', 'Nie znaleziono adresu email.');
        }
        
        //Kod na reset hasła
        //token - klucz shaszowany algorytmem sha256 które wygeneruje niepowtarzalny ciąg znaków, względem aktualnego czasu
        
        $token = hash('sha256', time());
        //zmiana tokenu w tablicy admins przy użytkowniku
        $admin_data->token = $token;
        $admin_data->update();
        
        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Zresetuj hasło';
        $message = 'Kliknij w poniższy link: <br>';
        $message .= '<a href="'.$reset_link.'">Kliknij</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('admin_login')->with('success', 'Proszę sprawdź email i wykonaj czynności w nim opisane.');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //Przy podaniu poprawnych danych zapisuje dane na stronie i przenosi na stronę główną panelu administratora
        if(Auth::guard('admin')->attempt($credential))
        {
            return redirect()->route('admin_home');
        }
        else
        {
            return redirect()->route('admin_login')->with('error', 'Podano niepoprawne dane!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function reset_password($token, $email)
    {
        $admin_data = Admin::where('token', $token)->where('email', $email)->first();
        if (!$admin_data) {
            return redirect()->route('admin_login');
        }

        return view('admin.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $admin_data = Admin::where('token', $request->token)->where('email', $request->email)->first();

        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();

        return redirect()->route('admin_login')->with('success', 'Pomyślnie zresetowano hasło');
    }
}
