<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\CandidateApplication;
use App\Models\CandidateEducation;
use App\Models\CandidateSkill;
use App\Models\CandidateExperience;
use App\Models\CandidateAward;
use App\Models\CandidateResume;
use App\Models\CandidateBookmark;
use App\Models\Job;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class CandidateController extends Controller
{
    public function dashboard ()
    {
        $total_applied_jobs = 0;
        $total_approved_jobs = 0;
        $total_rejected_jobs = 0;

        $total_applied_jobs = CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Zgłoszono')->count();
        $total_approved_jobs = CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Zatwierdzono')->count();
        $total_rejected_jobs = CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Odrzucono')->count();

        return view('candidate.dashboard', compact('total_applied_jobs', 'total_approved_jobs', 'total_rejected_jobs'));
    }

    public function edit_profile ()
    {
        return view('candidate.edit_profile');
    }

    public function edit_profile_update (Request $request)
    {
        $obj = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
        $id = $obj->id;

        $request->validate([
            'name' => 'required',
            'username' => ['required', 'alpha_dash', Rule::unique('candidates')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('candidates')->ignore($id)]
        ]);

        if($request->hasFile('photo'))
        {            
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(Auth::guard('candidate')->user()->photo != '')
            {
                unlink(public_path('uploads/'.$obj->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'candidate_photo_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->biography = $request->biography;
        $obj->phone = $request->phone;
        $obj->region = $request->region;
        $obj->address = $request->address;
        $obj->state = $request->state;
        $obj->city = $request->city;
        $obj->zip_code = $request->zip_code;
        $obj->gender = $request->gender;
        $obj->marital_status = $request->marital_status;
        $obj->date_of_birth = $request->date_of_birth;
        $obj->website = $request->website;
        $obj->update();

        return redirect()->back()->with('success', 'Pomyślnie zaktualizowano informacje.');
    }

    public function edit_password ()
    {
        return view('candidate.edit_password');
    }

    public function edit_password_update (Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $obj = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
        $obj->password = Hash::make($request->password);
        $obj->update();

        return redirect()->back()->with('success', 'Pomyślnie zmieniono hasło.');
    }

    public function education() 
    {
        $educations = CandidateEducation::where('candidate_id', Auth::guard('candidate')->user()->id)->orderBy('id', 'desc')->get();
        return view('candidate.education', compact('educations'));    
    }

    public function education_create() 
    {
        return view('candidate.education_create');    
    }

    public function education_store(Request $request) 
    {
        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required'
        ]);

        $obj = new CandidateEducation();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->level = $request->level;
        $obj->institute = $request->institute;
        $obj->degree = $request->degree;
        $obj->passing_year = $request->passing_year;
        $obj->save();

        return redirect()->route('candidate_education')->with('success', 'Pomyślnie dodano wykształcenie.');
    }

    public function education_edit($id) 
    {
        $education_single = CandidateEducation::where('id', $id)->first();
        return view('candidate.education_edit', compact('education_single'));    
    }

    public function education_update(Request $request, $id)
    {
        $obj = CandidateEducation::where('id', $id)->first();

        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required'
        ]);

        $obj->level = $request->level;
        $obj->institute = $request->institute;
        $obj->degree = $request->degree;
        $obj->passing_year = $request->passing_year;
        $obj->update();

        return redirect()->route('candidate_education')->with('success', 'Pomyślnie zaktualizowano wykształcenie.');
    }

    public function education_delete($id)
    {
        CandidateEducation::where('id', $id)->delete();
        return redirect()->route('candidate_education')->with('success', 'Pomyślnie usunięto dane.');
    }

    public function skills() 
    {
        $skills = CandidateSkill::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.skills', compact('skills'));    
    }

    public function skills_create() 
    {
        return view('candidate.skills_create');    
    }

    public function skills_store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'percentage' => 'required'
        ]);

        $obj = new CandidateSkill();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->save();

        return redirect()->route('candidate_skills')->with('success', 'Pomyślnie dodano umiejętność.');
    }

    public function skills_edit($id) 
    {
        $skills_single = CandidateSkill::where('id', $id)->first();
        return view('candidate.skills_edit', compact('skills_single'));    
    }

    public function skills_update(Request $request, $id)
    {
        $obj = CandidateSkill::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'percentage' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->update();

        return redirect()->route('candidate_skills')->with('success', 'Pomyślnie zaktualizowano umiejętność.');
    }

    public function skills_delete($id)
    {
        CandidateSkill::where('id', $id)->delete();
        return redirect()->route('candidate_skills')->with('success', 'Pomyślnie usunięto dane.');
    }

    public function experience() 
    {
        $experiences = CandidateExperience::where('candidate_id', Auth::guard('candidate')->user()->id)->orderBy('id', 'desc')->get();
        return view('candidate.experience', compact('experiences'));    
    }

    public function experience_create() 
    {
        return view('candidate.experience_create');    
    }

    public function experience_store(Request $request) 
    {
        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $obj = new CandidateExperience();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->company = $request->company;
        $obj->designation = $request->designation;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->save();

        return redirect()->route('candidate_experience')->with('success', 'Pomyślnie dodano zatrudnienie.');
    }

    public function experience_edit($id) 
    {
        $experiences_single = CandidateExperience::where('id', $id)->first();
        return view('candidate.experience_edit', compact('experiences_single'));    
    }

    public function experience_update(Request $request, $id)
    {
        $obj = CandidateExperience::where('id', $id)->first();

        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $obj->company = $request->company;
        $obj->designation = $request->designation;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->update();

        return redirect()->route('candidate_experience')->with('success', 'Pomyślnie zaktualizowano zatrudnienie.');
    }

    public function experience_delete($id)
    {
        CandidateExperience::where('id', $id)->delete();
        return redirect()->route('candidate_experience')->with('success', 'Pomyślnie usunięto dane.');
    }

    public function award() 
    {
        $awards = CandidateAward::where('candidate_id', Auth::guard('candidate')->user()->id)->orderBy('id', 'desc')->get();
        return view('candidate.award', compact('awards'));    
    }

    public function award_create() 
    {
        return view('candidate.award_create');    
    }

    public function award_store(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        $obj = new CandidateAward();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->date = $request->date;
        $obj->save();

        return redirect()->route('candidate_award')->with('success', 'Pomyślnie dodano wyróżnienie.');
    }

    public function award_edit($id) 
    {
        $awards_single = CandidateAward::where('id', $id)->first();
        return view('candidate.award_edit', compact('awards_single'));    
    }

    public function award_update(Request $request, $id)
    {
        $obj = CandidateAward::where('id', $id)->first();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->date = $request->date;
        $obj->update();

        return redirect()->route('candidate_award')->with('success', 'Pomyślnie zaktualizowano wyróżnienie.');
    }

    public function award_delete($id)
    {
        CandidateAward::where('id', $id)->delete();
        return redirect()->route('candidate_award')->with('success', 'Pomyślnie usunięto dane.');
    }

    public function resume() 
    {
        $resumes = CandidateResume::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.resume', compact('resumes'));    
    }

    public function resume_create() 
    {
        return view('candidate.resume_create');    
    }

    public function resume_store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,docx'
        ]);

        $ext = $request->file('file')->extension();
        $final_name = 'resume_'.time().'.'.$ext;
        $request->file('file')->move(public_path('uploads/'),$final_name);

        $obj = new CandidateResume();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->name = $request->name;
        $obj->file = $final_name;
        $obj->save();

        return redirect()->route('candidate_resume')->with('success', 'Pomyślnie dodano załącznik.');
    }

    public function resume_edit($id) 
    {
        $resumes_single = CandidateResume::where('id', $id)->first();
        return view('candidate.resume_edit', compact('resumes_single'));    
    }

    public function resume_update(Request $request, $id)
    {
        $obj = CandidateResume::where('id', $id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        if($request->hasFile('file'))
        {            
            $request->validate([
                'file' => 'mimes:pdf,doc,docx'
            ]);

            unlink(public_path('uploads/'.$obj->file));

            $ext = $request->file('file')->extension();
            $final_name = 'resume_'.time().'.'.$ext;

            $request->file('file')->move(public_path('uploads/'),$final_name);

            $obj->file = $final_name;
        }

        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('candidate_resume')->with('success', 'Pomyślnie zaktualizowano załącznik.');
    }

    public function resume_delete($id)
    {
        $resumes_single = CandidateResume::where('id', $id)->first();
        unlink(public_path('uploads/'.$resumes_single->file));

        CandidateResume::where('id', $id)->delete();
        return redirect()->route('candidate_resume')->with('success', 'Pomyślnie usunięto dane.');
    }

    public function bookmark_add($id)
    {
        $existing_bookmark_check = CandidateBookmark::where('candidate_id', Auth::guard('candidate')->
        user()->id)->where('job_id', $id)->count();
        if ($existing_bookmark_check > 0) {
            return redirect()->back()->with('error', 'Oferta jest już dodana do zakładki.');     
        }

        $obj = new CandidateBookmark();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Pomyślnie dodano ofertę do zakładki.');
    }

    public function bookmark_view()
    {
        $bookmarked_jobs = CandidateBookmark::with('rJob', 'rCandidate')->where('candidate_id', Auth::guard('candidate')->
        user()->id)->get();
        return view('candidate.bookmark', compact('bookmarked_jobs'));
    }

    public function bookmark_delete($id)
    {
        CandidateBookmark::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Pomyślnie usunięto ofertę z zakładki.');
    }

    public function apply($id)
    {
        $existing_apply_check = CandidateApplication::where('candidate_id', Auth::guard('candidate')->
        user()->id)->where('job_id', $id)->count();
        if ($existing_apply_check > 0) {
            return redirect()->back()->with('error', 'Już zgłosiłeś podanie w ofercie.');     
        }

        $job_single = Job::where('id', $id)->first();

        return view('candidate.apply', compact('job_single'));
    }

    public function apply_submit(Request $request, $id)
    {
        $request->validate([
            'cover_letter' => 'required'
        ]);

        $obj = new CandidateApplication();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->cover_letter = $request->cover_letter;
        $obj->status = 'Zgłoszono';
        $obj->save();

        //wysyłanie maila do pracodawcy
        $job_info = Job::with('rCompany')->where('id', $id)->first();
        $company_email = $job_info->rCompany->email;
        
        $applicants_list_url = route('company_applicants', $id);
        $subject = 'Nowa aplikacja do oferty';
        $message = 'Proszę sprawdzić zgłoszenie: ';
        $message .= '<a href="'.$applicants_list_url.'">Kliknij</a>';

        Mail::to($company_email)->send(new Websitemail($subject, $message));

        return redirect()->route('job',$id)->with('success', 'Pomyślnie zgłoszono aplikację.');

    }

    public function applications() 
    {
        $applied_jobs = CandidateApplication::with('rJob')->where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.applications', compact('applied_jobs'));
    }
}
