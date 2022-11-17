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
        $cekMuridAbsen = AttendanceStudent::where('student_id', $request['student'])
        ->where('attendance_id', $request['attendance'])->first();

        if(isset($cekMuridAbsen)){ 
            return redirect('/detail-attendance/'. $request['attendance'])->with(['failed' => 'Murid Sudah Diabsen']);
        } else{
            AttendanceStudent::create([
                'attendance_id' => $request['attendance'],
                'student_id' => $request['student']
            ]);
            return redirect('/detail-attendance/'. $request['attendance'])->with(['success' => 'Murid Berhasil Diabsen']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceStudent  $attendanceStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::where('id', $id)->get();
        $class_id = Attendance::where('id', $id)->first();

        // Cek class_id  ada apa kagak
        if (isset($class_id)) {
            $students = StudentClass::where('class', $class_id->class_id)->get();
            $attendanceStudentData = AttendanceStudent::where('attendance_id', $id)->get();

            return view('detail_attendance.index')->with(compact('attendance', 'attendanceStudentData', 'students'));
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
     * @param  \App\Http\Requests\UpdateAttendanceStudentRequest  $request
     * @param  \App\Models\AttendanceStudent  $attendanceStudent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceStudentRequest $request, AttendanceStudent $attendanceStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceStudent  $attendanceStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //update data to delete
        $attendanceStudent =  AttendanceStudent::where('id', $id)->first();
        
        try {
            AttendanceStudent::where('id', $id)->delete();

            //redirect to index
            return redirect('/detail-attendance/'. $attendanceStudent->attendance_id)->with(['success' => 'Berhasil Menghapus Murid']);
        } catch (Exception $e) {
            return redirect('/detail-attendance/'. $attendanceStudent->attendance_id)->with(['failed' => 'Gagal Menghapus Murid']);
        }
    }
}
