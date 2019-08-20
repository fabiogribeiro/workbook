<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index()
    {
        return view('internal.indexfile');
    }

    public function new()
    {
        return view('internal.newfile');
    }

    public function show()
    {
        return view('internal.showfile');
    }

    public function create(Request $request)
    {
    }
}
