<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
use Illuminate\Database\QueryException;
use Exception;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view('students.index', ['students' => $students]);

    }

    public function create()
    {

        return view('students.create');
    }

    public function store()
    {

        $rules = array(
            'name' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('students/create')
                ->withErrors('message', 'All fields should be filled in')
                ->withInput();
        } else {
            try {
                $student = new Students;
                $student->name = Input::get('name');
                $student->card_id = Input::get('card_id');
                $student->save();

                Session::flash('message', 'Successfully created nerd!');
                return Redirect::to('admin/students');
            } catch (ModelNotFoundException $e) {
                return back()->withInput()->withErrors();
            }

        }
    }

    public function show($id)
    {
        try {
            $student = Students::findOrFail($id);
            return view('students.show', ['student' => $student]);

        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }


    }

    public function edit($id)
    {
        try {
            $student = Students::findOrFail($id);

            // show the edit form and pass the nerd
            return view('students.edit')
                ->with('student', $student);
        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }
    }

    public function update($id)
    {
        $rules = array(
            'name' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('students/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                $student = Students::find($id);
                $student->name = Input::get('name');

                $student->save();

                Session::flash('message', 'Successfully updated nerd!');
                return Redirect::to('admin/students');
            } catch (Exception $e) {
                return back()->withInput()->withErrors();
            }

        }
    }

    public function destroy($id)
    {
        try {
            $student = Students::findOrFail($id);
            $student->delete();

            Session::flash('message', 'Successfully deleted the nerd!');
            return Redirect::to('admin/students');

        } catch (ModelNotFoundException $e) {
            return back()->withInput()->withErrors();
        }
    }
}
