<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateAttendanceStudentRequest;
use App\Models\Attendance;
use App\Models\AttendanceStudent;
use App\Models\StudentClass;
use App\Models\Kelas;
use Exception;


class AttendanceStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceStudent  $attendanceStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::where('id', $id)->first();
        $class = Attendance::where('id', $id)->first();

        // Cek class_id  ada apa kagak
        if (isset($class) && isset($attendance)) {
            $attendanceStudentData = AttendanceStudent::where('attendance_id', $id)->get();

            return view('detail_attendance.index')->with(compact('attendance', 'attendanceStudentData'));
        } else {
            return redirect(route('class.index'))->with(['failed' => 'Tanggal Tidak Ditemukan']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceStudent  $attendanceStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceStudent $attendanceStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            AttendanceStudent::where('id', $id)->update([
                'status' => $request['attendance'],
            ]);

            return redirect('/detail-attendance/'.$request['attendance_id'])->with(['success' => 'Murid Berhasil Diupdate']);
        }

        catch (Exception $e) {
            return redirect('/detail-attendance/'.$request['attendance_id'])->with(['failed' => 'Murid Gagal Diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceStudent  $attendanceStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showForm($id)
    {
         //student
         $attendance = AttendanceStudent::where('id', $id)->first();

         return response()->json([
             'attendance' => $attendance,
         ]);
    }
}
