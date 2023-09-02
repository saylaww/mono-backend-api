<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Course;
use App\Models\User;
use App\Response\Test;
use Cassandra\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use function Ramsey\Collection\add;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return response($courses, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required',
            'company_id' => 'required',
            'is_active' => 'required',
            'desc' => 'required',
        ]);

        Course::create([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
            'company_id' => $request->company_id,
            'is_active' => $request->is_active,
            'desc' => $request->desc,
        ]);

        return response("Course created!", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return response($course, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required',
            'company_id' => 'required',
            'is_active' => 'required',
            'desc' => 'required',
        ]);

        $course->name = $request->name;
        $course->teacher_id = $request->teacher_id;
        $course->company_id = $request->company_id;
        $course->is_active = $request->is_active;
        $course->desc = $request->desc;

        $course->save();

        return response("Course updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return response("Course deleted!!", 200);
    }

    /**
     *
     *
     *
     */

    public function getAllCourseByCompanyId(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
        ]);

        $courses = Course::where('company_id', $request->company_id)->get();
        return response($courses, 200);
    }

    public function getAllCourseByTeacherId(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
        ]);

        $courses = Course::where('user_id', $request->teacher_id)->get();
        return response($courses, 200);
    }

    public function test()
    {
//        $tests = Course::with('company')->where('id',2)->get();
//        $tests = Course::with('user')->with('role')->with('company')->where('id',2)->get();

//        $tests = Course::join('users','courses.user_id','=','users.id')->where('users.phone','4456987123')->get();

//        $tests = Course::join('users','users.id','=','courses.user_id')->
//        join('roles','users.id','=','roles.id')->
//        where('roles.name','DIRECTOR')->select('users.*')->get();


//        $ttt = Course::join('companies','courses.company_id','=','companies.id')->where('companies.id',1)->select('courses.*')->get();

//        $teach = User::join('courses','courses.user_id','=','users.id')->where('users.id',3)->get();

//        $teach = Company::find(2);
//        $teach = Company::join('users','users.id','=','companies.user_id')->where('companies.id',2)->get();

//        $teach = User::find(1);

//        $company = Company::find(1);


//        $cs = CompanyUser::find(1);
//dd($tests);
//        $tests = Course::query()->join('companies','')->where('id',1)->get();
//
//        $ccc = Course::query()
//        dd($tests);

//        $f = [];

//        foreach ($company->courses as $com){
////            print $com->user->phone;
//            $f->add($com->user->phone);
//        }

//        Gate::authorize('ruxsatpa');
//$this->authorize('test',[self::class]);
//        $this->authorize('isDirector', auth()->user());
//        Gate::authorize('isDirector', auth()->user());
//        Gate::authorize('isDirector')

//        return auth()->user()->role->name;
//        if (auth()->user()->role->name=='DIRECTOR1'){
//            return 'BAR';
//        }else{
//            return "JOQ";
//        }
        return Test::$START;
    }


}
