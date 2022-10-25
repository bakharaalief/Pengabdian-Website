<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalController extends Controller
{
    function index()
    {
        return view('normal.welcome');
    }
}
