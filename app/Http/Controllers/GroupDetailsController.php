<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupDetail;
use App\Http\Requests\StoreGroupDetailsRequest;
use App\Http\Requests\UpdateGroupDetailsRequest;
use Illuminate\Http\Request;

class GroupDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GroupDetail::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupDetail $groupDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupDetail $groupDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupDetailsRequest $request, GroupDetail $groupDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupDetail $groupDetails)
    {
        //
    }


    public function getAllPaidStudentsByGroupId(Request $request)
    {
        $request->validate([
            'group_id'=>'required',
        ]);
        $gd = GroupDetail::where('group_id',$request->group_id)->where('paid', true)->get();

//        dd($gd->count());
        $students = [];
        for ($i = 0; $i<$gd->count(); $i++){
            $students[$i] = $gd[$i];
        }

        return $gd;
    }

    public function getAllStudentHasRemovedByGroupId(Request $request)
    {
        $request->validate([
           'group_id'=>'required',
        ]);

        $groupDetails = GroupDetail::where('group_id',$request->group_id)->where('removed', true)->get();

        $students = [];
        $count = 0;
        foreach ($groupDetails as $groupDetail) {
            $students[$count]=$groupDetail->student;
            $count++;
        }

        return $students;
    }

    public function getAllStudentsNoPaid()
    {
        $groupDetails = GroupDetail::where('paid',false)->get();

        $students = [];
        $count = 0;
        foreach ($groupDetails as $groupDetail) {
            $students[$count]=$groupDetail->student;
            $count++;
        }

        return $students;
    }

    public function getAllStudentsNoPaidByGroupId(Request $request)
    {
        $request->validate([
            'group_id'=>'required',
        ]);

        $groupDetails = GroupDetail::where('paid',false)->where('group_id',$request->group_id)->get();

        $students = [];
        $count = 0;
        foreach ($groupDetails as $groupDetail) {
            $students[$count]=$groupDetail->student;
            $count++;
        }

        return $groupDetails;
    }

    public function getAllStudentsNoPaidByCourseId(Request $request)
    {
        $request->validate([
            'group_id'=>'required',
        ]);

//        $groupDetails = GroupDetail::where('paid',false)->where('group_id',$request->group_id)->get();

//        $tests = Course::join('users','courses.user_id','=','users.id')->where('users.phone','4456987123')->get();
        $groupDetails = GroupDetail::join('groups','group_details.group_id','=','groups.id')->where('groups.course_id',2)->where('group_details.paid',false)->get();

        $students = [];
        $count = 0;
        foreach ($groupDetails as $groupDetail) {
            $students[$count]=$groupDetail->student;
            $count++;
        }

        return $students;
    }






}
