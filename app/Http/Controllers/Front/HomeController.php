<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageItem;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobType;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobSalary;
use App\Models\Job;
use App\Models\WhyChooseItem;
use App\Models\Testimonial;
use App\Models\Post;

class HomeController extends Controller
{
    public function index () 
    {
        $home_page_data = HomePageItem::where('id', 1)->first();
        $job_categories = JobCategory::withCount('rJob')->orderBy('r_job_count', 'desc')->take(9)->get();
        $all_job_categories = JobCategory::orderBy('name', 'asc')->get();
        $all_job_locations = JobLocation::orderBy('name', 'asc')->get();
        $why_choose_items = WhyChooseItem::get();
        $testimonials = Testimonial::get();
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        $featured_jobs = Job::with('rCompany', 'rJobCategory', 'rJobLocation',
        'rJobType', 'rJobExperience', 'rJobGender', 'rJobSalary')->orderBy('id', 'desc')
        ->where('is_featured', 1)->get();

        return view('front.home', compact('home_page_data', 'job_categories',
        'why_choose_items', 'testimonials', 'posts', 'all_job_categories',
        'all_job_locations', 'featured_jobs'));
    }
}
