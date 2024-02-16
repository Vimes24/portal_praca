<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index()
    {
        $banner_data = Banner::where('id', 1)->first();
        return view('admin.banner', compact('banner_data'));
    }

    public function update(Request $request)
    {
        $obj = Banner::where('id', 1)->first();
        
        if($request->hasFile('baner_job_listing'))
        {
            $request->validate([
                'baner_job_listing' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_job_listing));
            $ext = $request->file('baner_job_listing')->extension();
            $final_name = 'baner_job_listing'.'.'.$ext;
            $request->file('baner_job_listing')->move(public_path('uploads/'),$final_name);
            $obj->baner_job_listing = $final_name;
        }

        if($request->hasFile('baner_job_detail'))
        {
            $request->validate([
                'baner_job_detail' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_job_detail));
            $ext = $request->file('baner_job_detail')->extension();
            $final_name = 'baner_job_detail'.'.'.$ext;
            $request->file('baner_job_detail')->move(public_path('uploads/'),$final_name);
            $obj->baner_job_detail = $final_name;
        }

        if($request->hasFile('baner_job_categories'))
        {
            $request->validate([
                'baner_job_categories' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_job_categories));
            $ext = $request->file('baner_job_categories')->extension();
            $final_name = 'baner_job_categories'.'.'.$ext;
            $request->file('baner_job_categories')->move(public_path('uploads/'),$final_name);
            $obj->baner_job_categories = $final_name;
        }

        if($request->hasFile('baner_company_listing'))
        {
            $request->validate([
                'baner_company_listing' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_company_listing));
            $ext = $request->file('baner_company_listing')->extension();
            $final_name = 'baner_company_listing'.'.'.$ext;
            $request->file('baner_company_listing')->move(public_path('uploads/'),$final_name);
            $obj->baner_company_listing = $final_name;
        }

        if($request->hasFile('baner_company_detail'))
        {
            $request->validate([
                'baner_company_detail' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_company_detail));
            $ext = $request->file('baner_company_detail')->extension();
            $final_name = 'baner_company_detail'.'.'.$ext;
            $request->file('baner_company_detail')->move(public_path('uploads/'),$final_name);
            $obj->baner_company_detail = $final_name;
        }

        if($request->hasFile('baner_pricing'))
        {
            $request->validate([
                'baner_pricing' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_job_listing));
            $ext = $request->file('baner_pricing')->extension();
            $final_name = 'baner_pricing'.'.'.$ext;
            $request->file('baner_pricing')->move(public_path('uploads/'),$final_name);
            $obj->baner_pricing = $final_name;
        }

        if($request->hasFile('baner_blog'))
        {
            $request->validate([
                'baner_blog' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_blog));
            $ext = $request->file('baner_blog')->extension();
            $final_name = 'baner_blog'.'.'.$ext;
            $request->file('baner_blog')->move(public_path('uploads/'),$final_name);
            $obj->baner_blog = $final_name;
        }

        if($request->hasFile('baner_post'))
        {
            $request->validate([
                'baner_post' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_post));
            $ext = $request->file('baner_post')->extension();
            $final_name = 'baner_post'.'.'.$ext;
            $request->file('baner_post')->move(public_path('uploads/'),$final_name);
            $obj->baner_post = $final_name;
        }

        if($request->hasFile('baner_faq'))
        {
            $request->validate([
                'baner_faq' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_faq));
            $ext = $request->file('baner_faq')->extension();
            $final_name = 'baner_faq'.'.'.$ext;
            $request->file('baner_faq')->move(public_path('uploads/'),$final_name);
            $obj->baner_faq = $final_name;
        }

        if($request->hasFile('baner_contact'))
        {
            $request->validate([
                'baner_contact' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_contact));
            $ext = $request->file('baner_contact')->extension();
            $final_name = 'baner_contact'.'.'.$ext;
            $request->file('baner_contact')->move(public_path('uploads/'),$final_name);
            $obj->baner_contact = $final_name;
        }

        if($request->hasFile('baner_terms'))
        {
            $request->validate([
                'baner_terms' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_terms));
            $ext = $request->file('baner_terms')->extension();
            $final_name = 'baner_terms'.'.'.$ext;
            $request->file('baner_terms')->move(public_path('uploads/'),$final_name);
            $obj->baner_terms = $final_name;
        }

        if($request->hasFile('baner_privacy'))
        {
            $request->validate([
                'baner_privacy' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_privacy));
            $ext = $request->file('baner_privacy')->extension();
            $final_name = 'baner_privacy'.'.'.$ext;
            $request->file('baner_privacy')->move(public_path('uploads/'),$final_name);
            $obj->baner_privacy = $final_name;
        }

        if($request->hasFile('baner_signup'))
        {
            $request->validate([
                'baner_signup' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_signup));
            $ext = $request->file('baner_signup')->extension();
            $final_name = 'baner_signup'.'.'.$ext;
            $request->file('baner_signup')->move(public_path('uploads/'),$final_name);
            $obj->baner_signup = $final_name;
        }

        if($request->hasFile('baner_login'))
        {
            $request->validate([
                'baner_login' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_login));
            $ext = $request->file('baner_login')->extension();
            $final_name = 'baner_login'.'.'.$ext;
            $request->file('baner_login')->move(public_path('uploads/'),$final_name);
            $obj->baner_login = $final_name;
        }

        if($request->hasFile('baner_forget_password'))
        {
            $request->validate([
                'baner_forget_password' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_forget_password));
            $ext = $request->file('baner_forget_password')->extension();
            $final_name = 'baner_forget_password'.'.'.$ext;
            $request->file('baner_forget_password')->move(public_path('uploads/'),$final_name);
            $obj->baner_forget_password = $final_name;
        }

        if($request->hasFile('baner_company_panel'))
        {
            $request->validate([
                'baner_company_panel' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_company_panel));
            $ext = $request->file('baner_company_panel')->extension();
            $final_name = 'baner_company_panel'.'.'.$ext;
            $request->file('baner_company_panel')->move(public_path('uploads/'),$final_name);
            $obj->baner_company_panel = $final_name;
        }

        if($request->hasFile('baner_candidate_panel'))
        {
            $request->validate([
                'baner_candidate_panel' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->baner_candidate_panel));
            $ext = $request->file('baner_candidate_panel')->extension();
            $final_name = 'baner_candidate_panel'.'.'.$ext;
            $request->file('baner_candidate_panel')->move(public_path('uploads/'),$final_name);
            $obj->baner_candidate_panel = $final_name;
        }
        $obj->update();

        return redirect()->back()->with('success', 'Pomyślnie zaktualizowano informacje.');
    }
}
