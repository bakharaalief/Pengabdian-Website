<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Kelas;
use Exception;

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
        $class = Kelas::where('id', $id)->first();

        // cek class-nya ada ga
        if (isset($class)) {
            $attendances = Attendance::where('class_id', $id)->get();     
            return view('attendance.index')->with(compact('attendances'));
        } else {
            return redirect(route('class.index'))->with(['failed' => 'Kelas Tidak DiTemukan']);
        }
    }
    
    public function destroy($id) 
    {
        //update data to delete
        $attendances =  Attendance::where('id', $id)->first();
        
        try {
            Attendance::where('id', $id)->delete();

            //redirect to index
            return redirect('/attendance/'. $attendances->class_id)->with(['success' => 'Berhasil Menghapus Tanggal']);
        } catch (Exception $e) {
            return redirect('/attendance/'. $attendances->class_id)->with(['failed' => 'Gagal Menghapus Tanggal']);
        }
    }
}