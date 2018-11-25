<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

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
                ->withErrors($validator)
                ->withInput();
        } else {

            $student       = new Students;
            $student->name = Input::get('name');
            $student->card_id = Input::get('card_id');
            $student->save();

            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('students');
        }
    }

    public function show($id)
    {
        $student = Students::find($id);

        return view('students.show', ['student' => $student]);
    }

    public function edit($id)
    {
        $student = Students::find($id);

        // show the edit form and pass the nerd
        return view('students.edit')
            ->with('student', $student);
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

            $student       = Students::find($id);
            $student->name = Input::get('name');

            $student->save();

            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('students');
        }
    }

    public function destroy($id)
    {
        $student = Students::find($id);
        $student->delete();

        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('students');
    }
}
