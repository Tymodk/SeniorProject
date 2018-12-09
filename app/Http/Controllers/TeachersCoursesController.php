<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Teachers;
use App\TeachersCourses;
use Complex\Exception;
use Excel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class TeachersCoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::paginate(15);
        $data = $courses;
        return view('teachercourses.index', ['data' => $data]);
    }

    public function single($id)
    {
        try {
            $course = Courses::where('id', $id)->firstOrFail();
            $teachers = TeachersCourses::where('course_id', $course->id)->pluck('teacher_id');
            $teachersinfo = Teachers::whereIn('id', $teachers)->get();
            return view('teachercourses.show', ['course' => $course, 'teachers' => $teachersinfo]);
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }

    }


    public function deleteCourse($teacherid, $courseid)
    {
        try {
            $item = TeachersCourses::where('teacher_id', $teacherid)->where('course_id', $courseid)->firstOrFail();
            $item->delete();
            return back()->withInput();
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }

    }


    public function addCourse($id)
    {
        try {
            $teacher = Teachers::where('id', $id)->firstOrFail();
            $tCourses = TeachersCourses::where('teacher_id', $id)->pluck('course_id');
            $coursesleft = Courses::WhereNotIn('id', $tCourses)->pluck('name', 'id');
            return view('teachercourses.create', ['courses' => $coursesleft, 'teacher' => $teacher]);
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }

    }


    public function store(Request $request)
    {
        try {
            $new = new TeachersCourses();
            $new->course_id = $request->input('courseid');
            $new->teacher_id = $request->input('teacherid');
            $new->save();
            return redirect()->action('TeachersCourses@index');
        } catch (Exception $e) {
            return back()->withInput()->withErrors();
        }

    }

    public function teacher($id)
    {
        try {
            $courses = TeachersCourses::where('teacher_id', $id)->pluck('course_id');
            $coursesinfo = Courses::whereIn('id', $courses)->get();
            $teacher = Teachers::where('id', $id)->firstOrFail();
            return view('teachers.courses', ['courses' => $coursesinfo, 'teacher' => $teacher]);
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }

    }


    public function storeCourse(Request $request)
    {
        foreach ($request->input('courses') as $value) {
            $course = new TeachersCourses();
            $course->teacher_id = $request->input('id');
            $course->course_id = $value;
            $course->save();
        }
        return view('studentcourses.test', ['test' => $request->input('courses')]);
    }

    public function delete()
    {
        return;
    }

}
