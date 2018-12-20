<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function changeLang(Request $request)
    {
        $lang = $request->lang;
        $user = $request->user();

        if ($user) {
            $user->lang = $lang;
            $user->save();
        }
        else {
            $request->session()->put('lang', $lang);
        }

        return back();
    }
}
