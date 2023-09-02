<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Response\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::all();
//        return response()->json([
//           'message'=>'',
//           'success'=>false,
//           'data'=>''
//        ]);

        $api = new ApiResponse("fd",false,"");

        return response($api->getData(),$api->getSuccess()?200:400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'username'=>'required',
            'password'=>'required',
            'role_id'=>'required',
            'is_active'=>'required',
        ]);

        User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'role_id'=>$request->role_id,
            'is_active'=>$request->is_active,
        ]);

        return response("User created", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $teacher)
    {
        return response($teacher, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $teacher)
    {
        $teacher->first_name=$request->first_name;
        $teacher->last_name=$request->last_name;
        $teacher->phone=$request->phone;
        $teacher->is_active=$request->is_active;
        $teacher->role_id=$request->role_id;

        $teacher->save();

        return response("User updated", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();

        return response("User deleted", 200);
    }

    /**
     *
     *
     */

    public function getAllTeachersByCompanyId(Request $request)
    {
        $request->validate([
           'company_id'=>'required',
        ]);

        $company = Company::find($request->company_id);

        return $company->users;
    }





}
