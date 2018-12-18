<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Classes;
use App\TeachersCourses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try {
        $user = Auth::user();
        $courses = TeachersCourses::where('teacher_id', $user->teacher_id)->pluck('course_id');
        $firstClass = Classes::
        whereIn('course_id', $courses)
        ->where('end_time', '>', date('Y/m/d'))
        ->firstOrFail();

        $datetime1 = new DateTime($firstClass->start_time);
        $datetime2 = new DateTime(date("Y-m-d H:i:s"));
        $interval = $datetime1->diff($datetime2);

        $classesActive = Classes::
        whereIn('course_id', $courses)
        ->where('active', 1)
        ->orderBy('start_time')
        ->get();

        $classesToday = Classes::
        whereIn('course_id', $courses)
        ->where('active', 0)
        ->where('end_time', '>', date('Y/m/d'))
        ->where('end_time', '<', date("Y-m-d", strtotime("+1 day")))
        ->orderBy('start_time')
        ->get();

        $classesWeek = Classes::
        whereIn('course_id', $courses)
        ->where('start_time', '>', date("Y-m-d", strtotime("+1 day")))
        ->where('end_time', '<', date("Y-m-d", strtotime("+1 Week")))
        ->orderBy('start_time')
        ->get();

        return view('wireframe', array(
          'user' => $user,
          'classesActive' => $classesActive,
          'classesToday' => $classesToday,
          'classesThisWeek' => $classesWeek,
          'interval'=> $interval,
          'firstClass'=>$firstClass
        ));
      } catch (ModelNotFoundException $e) {
          return back()->withInput()->withErrors();
      }


    }
}
