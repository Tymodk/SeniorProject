<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Courses;
use App\Students;
use App\StudentsCourses;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class StudentsCoursesController extends Controller
{
    //

    public function index()
    {
        $courses = Courses::select('name')->get();
        return view('studentcourses.index', ['courses' => $courses]);
    }

    public function addcourse($id)
    {
        $student = Students::where('id', $id)->first();
        $allcourses = Courses::all();

        $followed = StudentsCourses::where('student_id', $student->id)->pluck('course_id');
        if (count($followed) > 0) {

            $followedCourses = Courses::whereIn('id', $followed)->get();

            $notfollowed = Courses::whereNotIn('id', $followed)->get();
        } else {
            $followedCourses = null;
            $notfollowed = Courses::all();
        }

        $studentcourses = null;
        return view('studentcourses.add', ['courses' => $notfollowed, 'student' => $student, 'followed' => $followedCourses]);
    }

    public function store(Request $request)

    {
        $all = $request->input();
        $userid = $request->input('userid');


        foreach ($all as $key => $value) {

            if ($key != 'userid' && $key != '_token') {
                $new = new StudentsCourses();
                $new->student_id = $userid;
                $new->course_id = $value;
                $new->save();
            }


        }

        return back()->withInput();
    }

    public function deletecourse($studentid, $courseid)
    {
        try {
            $studentcourse = StudentsCourses::where('student_id', $studentid)->where('course_id', $courseid)->firstOrFail();
            $studentcourse->delete();
            return back()->withInput();
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }

    }
}
