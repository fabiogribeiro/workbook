<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;

use App\Jobs\GetSubjectsByDomain;

class SubjectsController extends Controller
{
    /**
     * 
     * Show the dashboard containing all subjects
     * 
     * @return \Http\Illuminate\Response
    */
    public function index()
    {
        $subjects = GetSubjectsByDomain::dispatchNow();

        return view('dashboard', ['subjects' => $subjects]);
    }
    public function new()
    {
        return view('internal.newsubject');
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
        return view('internal.showsubject', ['subject' => $subject]);
    }
}
