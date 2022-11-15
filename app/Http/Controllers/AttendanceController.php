<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\StudyTime;

class AttendanceController extends Controller
{
    function index()
    {
        $classes = Kelas::all();
        $studyTime = StudyTime::all();
        return view('attendance.index')->with(compact('classes', 'studyTime'));
    }
}
