<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\JobGender;

class AdminJobGenderController extends Controller
{
    public function index()
    {
        $job_genders = JobGender::get();
        return view('admin.job_gender', compact('job_genders'));
    }

    public function create()
    {
        return view('admin.job_gender_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobGender();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_gender')->with('success', 'Pomyślnie zapisano informacje.');

    }

    public function edit($id)
    {
        $job_gender_single = JobGender::where('id', $id)->first();
        return view('admin.job_gender_edit', compact('job_gender_single'));
    }

    public function update (Request $request, $id)
    {
        $obj = JobGender::where('id', $id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_gender')->with('success', 'Pomyślnie zaktualizowano informacje.');
    }

    public function delete($id)
    {
        $check = Job::where('job_gender_id', $id)->count();
        if($check > 0)
        {
            return redirect()->back()->with('error', 'Nie można usunąć danych ponieważ są użyte w innym miejscu.');
        }
        JobGender::where('id', $id)->delete();
        return redirect()->route('admin_job_gender')->with('success', 'Pomyślnie usunięto informacje.');
    }
}
