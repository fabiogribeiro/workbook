<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    /**
     * Show the dashboard containing all subjects
     * 
     * @return \Http\Illuminate\Response
    */
    public function index()
    {
        $subjects = Subject::all();

        return view('dashboard', ['subjects' => $subjects]);
    }
}
