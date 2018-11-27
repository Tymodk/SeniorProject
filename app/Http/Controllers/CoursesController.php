<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::paginate(15);
        return view('courses.index', ['courses' => $courses]);

    }

    public function create()
    {

        return view('courses.create');
    }

    public function store()
    {

        $rules = array(
            'name' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('courses/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $course       = new Courses;
            $course->name = Input::get('name');

            $course->save();

            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/courses');
        }
    }

    public function show($id)
    {
        $course = Courses::find($id);

        return view('courses.show', ['course' => $course]);
    }

    public function edit($id)
    {
        $course = Courses::find($id);

        // show the edit form and pass the nerd
        return view('courses.edit')
            ->with('course', $course);
    }

    public function update($id)
    {
        $rules = array(
            'name' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('courses/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $course       = Courses::find($id);
            $course->name = Input::get('name');

            $course->save();

            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('admin/courses');
        }
    }

    public function destroy($id)
    {
        $course = Courses::find($id);
        $course->delete();

        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('admin/courses');
    }
}
