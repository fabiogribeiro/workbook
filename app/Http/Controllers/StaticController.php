<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\SetLocale;

class StaticController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function changeLang(Request $request)
    {
        SetLocale::recordPreference($request->lang);

        return back();
    }
}
