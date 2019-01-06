<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\SetLocale;
use App\Jobs\GetSubjectsByDomain;

class StaticController extends Controller
{
    public function index()
    {
        $subjects = GetSubjectsByDomain::dispatchNow();

        return view('index', ['subjects' => $subjects]);
    }

    public function changeLang(Request $request)
    {
        SetLocale::recordPreference($request->lang);

        return back();
    }
}
