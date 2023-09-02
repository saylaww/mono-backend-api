<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use function Nette\Utils\data;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'first_name'=> 'required',
           'last_name'=> 'required',
           'phone'=> 'required',
        ]);

        Student::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'phone'=> $request->phone,
        ]);


        return response("Student added", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response($student, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
           'first_name'=>'required',
           'last_name'=>'required',
           'phone'=>'required',
        ]);

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;

        $student->save();
        return response('Student updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response("Student deleted!", 200);
    }


    public function getAllStudentsByGroupId(Request $request)
    {
        $request->validate([
            'group_id'=>'required',
        ]);
        $test = Auth::user();

//        $student = Student::find($request->group_id);

        $group = Group::find($request->group_id);

//        return $group->students;
        return $request->user();
    }





}
