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
    public function new()
    {
        return view('subjects.new');
    }

    public function create(Request $request)
    {
        $subject = new Subject;

        $subject->title = $request->title;
        $subject->domain = $request->domain;
        $subject->slug = str_slug($request->title);

        $subject->save();

        return redirect(route('dashboard'));
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', ['subject' => $subject]);
    }
}
