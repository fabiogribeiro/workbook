<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    private $allDomains;

    public function __construct()
    {
        $this->allDomains = ['math', 'physics', 'chemistry'];
    }

    /**
     * 
     * Show the dashboard containing all subjects
     * 
     * @return \Http\Illuminate\Response
    */
    public function index()
    {
        $allSubjects = Subject::all();
        $organized = array();

        foreach ($this->allDomains as $domain) {
            $organized[$domain] = [];
        }

        foreach($allSubjects as $subject) {
            $organized[$subject->domain][] = $subject;
        }

        return view('dashboard', ['subjects' => $organized, 'domains' => $this->allDomains]);
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
