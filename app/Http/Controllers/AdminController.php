<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\Courses;
use App\Teachers;
class AdminController extends Controller
{
    //
    public function index()
    {
    	$countStud = Students::all()->count();
    	$countCours = Courses::all()->count();
    	$countTeach = Teachers::all()->count();
    	
    	$info = [$countTeach, $countStud, $countCours];
    	return view('admin',['info'=>$info]);
    }
}
