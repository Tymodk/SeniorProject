<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Teachers;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class TeachersController extends Controller
{
    public function index()
    {

        $para     = Input::all();
        $teachers = Teachers::paginate(10);

        if (Input::get('filter')) {
            if (Input::get('filter') == 'created-first') {
                $teachers = Teachers::OrderBy('created_at', 'ASC')->paginate(10);
                            }
            elseif (Input::get('filter') == 'created-last') {
                $teachers = Teachers::OrderBy('created_at', 'DESC')->paginate(10);
               
            } else {
                $teachers = Teachers::OrderBy(Input::get('filter'))->paginate(10);
                
            }

        }
        return view('teachers.index', ['teachers' => $teachers, 'para' => $para]);

    }

    public function create()
    {

        return view('teachers.create');
    }

    public function store()
    {

        $rules = array(
            'name' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('teachers/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $teacher           = new Teachers;
            $teacher->name     = Input::get('name');
            $teacher->email    = Input::get('email');
            $teacher->password = Input::get('password');
            $teacher->save();

            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/teachers');
        }
    }

    public function show($id)
    {
        $teacher = Teachers::find($id);

        return view('teachers.show', ['teacher' => $teacher]);
    }

    public function edit($id)
    {
        $teacher = Teachers::find($id);

        // show the edit form and pass the nerd
        return view('teachers.edit')
            ->with('teacher', $teacher);
    }

    public function update($id)
    {
        $rules = array(
            'name' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('teachers/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $teacher           = new Teachers;
            $teacher->name     = Input::get('name');
            $teacher->email    = Input::get('email');
            $teacher->password = Input::get('password');
            $teacher->save();

            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('admin/teachers');
        }
    }

    public function destroy($id)
    {
        $teacher = Teachers::find($id);
        $teacher->delete();

        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('/admin/teachers');
    }

    public function upload(Request $request)
    {
        //\Maatwebsite\Excel\Excel::XLSX

        Excel::import(new UsersImport, request()->file('excel'), null, \Maatwebsite\Excel\Excel::XLSX);

        Session::flash('message', 'Successfully uploaded excel file!');
        return Redirect::to('admin/teachers');

    }
}
