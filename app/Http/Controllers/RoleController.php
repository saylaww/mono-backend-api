<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return response($roles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'company_id'=>'required',
           'is_active'=>'required',
        ]);

        Role::create([
            'name'=>$request->name,
            'company_id'=>$request->company_id,
            'is_active'=>$request->is_active,
        ]);

        return response('Role created', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return response($role,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required',
            'company_id'=>'required',
            'is_active'=>'required',
        ]);

        $role->name = $request->name;
        $role->company_id = $request->company_id;
        $role->is_active = $request->is_active;

        $role->save();

        return response("Role updated!", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response("Role deleted!", 200);
    }


}
