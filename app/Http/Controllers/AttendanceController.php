<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\StudyTime;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    function index()
    {
        $classes = Kelas::all();
        $studyTime = StudyTime::all();
        $attendances = Attendance::where('id');
        return view('attendance.index')->with(compact('classes', 'studyTime'));
    }
}
