<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\CompanyIndustry;

class AdminCompanyIndustryController extends Controller
{
    public function index()
    {
        $company_industries = CompanyIndustry::get();
        return view('admin.company_industry', compact('company_industries'));
    }

    public function create()
    {
        return view('admin.company_industry_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new CompanyIndustry();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_company_industry')->with('success', 'Pomyślnie zapisano informacje.');

    }

    public function edit($id)
    {
        $company_industry_single = CompanyIndustry::where('id', $id)->first();
        return view('admin.company_industry_edit', compact('company_industry_single'));
    }

    public function update (Request $request, $id)
    {
        $obj = CompanyIndustry::where('id', $id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_company_industry')->with('success', 'Pomyślnie zaktualizowano informacje.');
    }

    public function delete($id)
    {
        $check = Company::where('company_industry_id', $id)->count();
        if($check > 0)
        {
            return redirect()->back()->with('error', 'Nie można usunąć danych ponieważ są użyte w innym miejscu.');
        }
        CompanyIndustry::where('id', $id)->delete();
        return redirect()->route('admin_company_industry')->with('success', 'Pomyślnie usunięto informacje.');
    }
}
