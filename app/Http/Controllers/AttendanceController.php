<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    function index()
    {
        //
    }

    public function store(Request $request)
    {
        $tanggal = date("y-m-d", strtotime($request['tanggal']));
        
        $cekTanggal = Attendance::where('tanggal', $tanggal)
        ->where('class_id', $request['class_id'])->first();

        if (isset($cekTanggal)) {
            return redirect('/attendance/'. $request['class_id'])->with(['failed' => 'Tanggal Sudah Ada']);
        } else {
            Attendance::create([
                'tanggal' => date("y-m-d", strtotime($request['tanggal'])),
                'class_id' => $request['class_id']
            ]);
            return redirect('/attendance/'. $request['class_id'])->with(['success' => 'Tanggal Berhasil Ditambah']);
        }
    }

    public function show($id)
    {
        $attendances = Attendance::where('class_id', $id)->get(); 
        
        return view('attendance.index')->with(compact('attendances'));
    }
}