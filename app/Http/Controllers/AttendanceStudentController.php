<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceStudentRequest;
use App\Http\Requests\UpdateAttendanceStudentRequest;
use App\Models\AttendanceStudent;

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
    public function store(StoreAttendanceStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceStudent  $attendanceStudent
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceStudent $attendanceStudent)
    {
        //
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
    public function destroy(AttendanceStudent $attendanceStudent)
    {
        //
    }
}
