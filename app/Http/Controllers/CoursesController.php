<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Exception;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::paginate(15);
        if (Input::get('filter')) {
            if (Input::get('filter') == 'created-first') {
                $courses = Courses::OrderBy('created_at', 'ASC')->paginate(10);
            } elseif (Input::get('filter') == 'created-last') {
                $courses = Courses::OrderBy('created_at', 'DESC')->paginate(10);
            } else {
                $courses = Courses::OrderBy(Input::get('filter'))->paginate(10);
            }

        }
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
            return Redirect::to('admin/courses/create')
                ->withErrors('message', 'The course could not be saved')
                ->withInput();
        } else {
            try {
                $course = new Courses;
                $course->name = Input::get('name');
                $course->slug = str_slug(Input::get('name'),'-');
                $course->save();

                Session::flash('message', 'Successfully created the course!');
                return Redirect::to('admin/courses');
            } catch (Exception $e) {
                return back()->withInput()->withErrors('message', 'The course could not be saved, there is a problem with the database');
            }

        }
    }

    public function show($id)
    {
        try {
            $course = Courses::findOrFail($id);
            return view('courses.show', ['course' => $course]);

        } catch (ModelNotFoundException $ex) {
            return back()->withInput()->withErrors('message', 'The course could not be found');
        }


    }

    public function edit($id)
    {
        try {
            $course = Courses::findOrFail($id);
            return view('courses.edit')
                ->with('course', $course);
        } catch (ModelNotFoundException $ex) {
            return back()->withInput()->withErrors('message', 'The course could not be found!');
        }


    }

    public function update($id)
    {
        $rules = array(
            'name' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/courses/' . $id . '/edit')
                ->withErrors('message', 'The course could not be updated')
                ->withInput();
        } else {

            try {
                $course = Courses::findOrFail($id);
                $course->name = Input::get('name');
                $course->slug = str_slug(Input::get('name'),'-');
                $course->save();

                Session::flash('message', 'Successfully updated the course!');
                return Redirect::to('admin/courses');

            } catch (ModelNotFoundException $e) {
                return back()->withInput()->withErrors('message', 'The course could not be updated');
            }


        }
    }

    public function destroy($id)
    {
        try {
            $course = Courses::findOrFail($id);
            $course->delete();

            Session::flash('message', 'Successfully deleted the nerd!');
            return Redirect::to('admin/courses');

        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors('message', 'The course could not be destroyed');
        }
    }
}
