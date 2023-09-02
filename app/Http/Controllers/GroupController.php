<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupDetail;
use App\Models\Student;
use Illuminate\Http\Request;
use function Ramsey\Collection\Map\get;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return response($groups, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
//            'start'=>'required',
//            'end'=>'required',
        ]);

        Group::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
//            'start'=>$request->start,
//            'end'=>$request->end,
        ]);

        return response("Group created!!!", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return response($group, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'teacher_id' => 'required',
            'course_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $group->teacher_id = $request->teacher_id;
        $group->course_id = $request->course_id;
        $group->start = $request->start;
        $group->end = $request->end;

        $group->save();

        return response("Group edit!!", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return response("Delete group!!!", 200);
    }


    public function getAllGroupByTeacherId(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

//        $teacher = User::find($request->user_id);

        $groups = Group::where('user_id', $request->user_id)->get();

        return $groups;
    }

    public function addStudentToGroup(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'students' => 'required',
        ]);

        $group = Group::find($request->group_id);

        $group->students()->attach($request->students);

        $count = 0;
        $students = [];
        foreach ($request->students as $student) {
            array_push($students, Student::find($student));
        }

        foreach ($students as $student) {
            GroupDetail::create([
                'student_id'=>$student->id,
                'group_id'=>$request->group_id,
                'removed'=>false,
                'paid'=>null,
            ]);
        }

        return response("Attached!!!", 200);
    }

    public function getAllGroupIsActive()
    {
        return Group::where('active',true)->get();
//        return response();
    }

    public function getAllGroupIsActiveByCompanyId(Request $request)
    {
//        $request->validate([
//           'company_id'=>'required',
//        ]);

//        $gr=  Group::find(1);
//        $course =  $gr->course;
//        $com =  $course->company;
//        return $com->id;
//        Course::join('companies','courses.company_id','=','companies.id')->where('companies.id',1)->select('courses.*')->get();

        return Group::join('courses','groups.course_id','=','courses.id')->where('groups.active',true)->join('companies','courses.company_id','=','companies.id')->where('companies.id',2)->select('groups.*')->get();
    }

    public function getAllGroupNotActive()
    {
        return Group::where('active',false)->get();
    }

    public function getAllGroupByCourseId(Request $request)
    {
        $request->validate([
            'course_id'=>'required',
        ]);
        $groups = Group::where('course_id', $request->course_id)->get();
        return $groups;
    }

    public function getAllGroupByTeacherIdAndIsActive(Request $request)
    {
        $request->validate([
           'user_id'=>'required',
        ]);
        $groups = Group::where('user_id',$request->user_id)->where('active',true)->get();
//        return $groups;

        return response()->json([
            "success"=>true,
            "message"=>"All group by user id and is active group",
            "data"=>$groups,
        ]);
    }

    public function getAllGroupByTeacherIdAndIsNotActive(Request $request)
    {
        $request->validate([
           'user_id'=>'required',
        ]);
        $groups = Group::where('user_id',$request->user_id)->where('active',false)->get();

        return response()->json([
            "success"=>true,
            "message"=>"All group by user id and is NOT active group",
            "data"=>$groups,
        ]);
    }

    public function test()
    {

        return GroupDetail::where('paid',null)->get();
    }



}
