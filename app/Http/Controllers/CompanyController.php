<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return $companies;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
//            'company_id' => '',
            'is_active' => 'required',
        ]);

        Company::create([
            'name'=>$request->name,
            'is_active'=>$request->is_active,
        ]);

        return response("Company created",200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return response($company,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
//            'company_id' => '',
            'is_active' => 'required',
        ]);
        $company->name = $request->name;
        $company->is_active = $request->is_active;
        $company->save();

        return response("Company updated", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response("Company deleted", 200);
    }



    public function getAllCompanyByParentId()
    {
        $companies = Company::where('company_id', 1)->get();
        return response($companies, 200);
    }

    public function getAllCompanyByTeacherId(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
        ]);

        $teachers = User::find($request->user_id);

        return $teachers->companies;
    }

    public function getRoles()
    {
        $company = Company::find(1);

        return $company->roles;
    }



}
