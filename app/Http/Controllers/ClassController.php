<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    function index()
    {
        return view('class.index');
    }
}
