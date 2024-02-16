<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use App\models\JobLocation;
use App\models\JobSalary;
use App\models\JobExperience;
use App\models\JobType;
use App\models\JobGender;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\PageOtherItem;
use Illuminate\Support\Facades\Mail;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'asc')->get();
        $job_salary_ranges = JobSalary::orderBy('id', 'asc')->get();

        $form_title = $request->title;
        $form_category = $request->category;
        $form_location = $request->location;
        $form_type = $request->type;
        $form_experience = $request->experience;
        $form_gender = $request->gender;
        $form_salary_range = $request->salary_range;
        
        $jobs = Job::with('rCompany', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobExperience', 'rJobGender', 'rJobSalary')->orderBy('id','desc');

        if ($request->title != null) {
            $jobs = $jobs->where('title','LIKE','%'.$request->title.'%');
        }

        if ($request->category != null) {
            $jobs = $jobs->where('job_category_id', $request->category);
        }
        
        if ($request->location != null) {
            $jobs = $jobs->where('job_location_id', $request->location);
        }

        if ($request->type != null) {
            $jobs = $jobs->where('job_type_id', $request->type);
        }

        if ($request->experience != null) {
            $jobs = $jobs->where('job_experience_id', $request->experience);
        }

        if ($request->gender != null) {
            $jobs = $jobs->where('job_gender_id', $request->gender);
        }

        if ($request->salary_range != null) {
            $jobs = $jobs->where('job_salary_range_id', $request->salary_range);
        }

        $jobs = $jobs->paginate(9);

        $other_page_item = PageOtherItem::where('id', 1)->first();

        return view('front.job_listing', compact('jobs', 'job_categories',
        'job_locations', 'form_title', 'form_category', 'form_location',
        'job_types', 'job_experiences', 'job_genders', 'job_salary_ranges', 'form_type', 'form_experience',
        'form_gender', 'form_salary_range', 'other_page_item'));
    }

    public function detail($id)
    {
        $job_single = Job::with('rCompany', 'rJobCategory', 'rJobLocation',
        'rJobType', 'rJobExperience', 'rJobGender', 'rJobSalary')->where('id', $id)->first();

        $jobs = Job::with('rCompany', 'rJobCategory', 'rJobLocation',
        'rJobType', 'rJobExperience', 'rJobGender', 'rJobSalary')
        ->where('job_category_id',$job_single->job_category_id)->get();

        $other_page_item = PageOtherItem::where('id', 1)->first();

        
        return view('front.job', compact('job_single', 'jobs', 'other_page_item'));
    }

    public function send_email (Request $request)
    {
        $request->validate([
            'visitor_name' => 'required',
            'visitor_email' => 'required|email',
            'visitor_message' => 'required'
        ]);

        $subject = 'Pytanie o ofertę pracy: '.$request->job_title;
        $message = 'Dane kontaktowe: <br>';
        $message .= 'Imię: '.$request->visitor_name.'<br>';
        $message .= 'Email: '.$request->visitor_email.'<br>';
        $message .= 'Numer telefonu: '.$request->visitor_phone.'<br>';
        $message .= 'Wiadomość: '.$request->visitor_message.'<br>';

        Mail::to($request->receive_email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Pomyślnie wysłano email. Instytucja wkrótce się z Tobą skontaktuje.');
    }
}
