<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\JobSalary;

class AdminJobSalaryController extends Controller
{
    public function index()
    {
        $job_salaries = JobSalary::get();
        return view('admin.job_salary', compact('job_salaries'));
    }

    public function create()
    {
        return view('admin.job_salary_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobSalary();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_salary')->with('success', 'Pomyślnie zapisano informacje.');

    }

    public function edit($id)
    {
        $job_salary_single = JobSalary::where('id', $id)->first();
        return view('admin.job_salary_edit', compact('job_salary_single'));
    }

    public function update (Request $request, $id)
    {
        $obj = JobSalary::where('id', $id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_salary')->with('success', 'Pomyślnie zaktualizowano informacje.');
    }

    public function delete($id)
    {
        $check = Job::where('job_salary_range_id', $id)->count();
        if($check > 0)
        {
            return redirect()->back()->with('error', 'Nie można usunąć danych ponieważ są użyte w innym miejscu.');
        }
        JobSalary::where('id', $id)->delete();
        return redirect()->route('admin_job_salary')->with('success', 'Pomyślnie usunięto informacje.');
    }
}
