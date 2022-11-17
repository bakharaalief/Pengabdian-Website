<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use App\Models\StudentClass;
use Exception;
use Illuminate\Http\Request;

class StudentClassController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekMuridAda = StudentClass::where('student', $request['student'])
            ->where('class', $request['class'])
            ->first();
            
        if(isset($cekMuridAda)){ 
            return redirect('/detail-class/'. $request['class'])->with(['failed' => 'Murid Sudah Terdaftar']);
        } else{
            StudentClass::create([
                'student' => $request['student'],
                'class' => $request['class']
            ]);
            return redirect('/detail-class/'. $request['class'])->with(['success' => 'Murid Berhasil Terdaftar']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Kelas::where('id', $id)->first();

        //cek ada ngggak kelasnya
        if(isset($class)){
            $students = Student::all();
            $studentClassData = StudentClass::where('class', $id)->get();
            return view('detail_class.index')->with(compact('class', 'studentClassData', 'students'));
        } else{
            return redirect(route('class.index'))->with(['failed' => 'Kelas Tidak DiTemukan']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //update data to delete
        $class =  StudentClass::where('id', $id)->first();

        try {
            StudentClass::where('id', $id)->delete();

            //redirect to index
            return redirect('/detail-class/'. $class->class)->with(['success' => 'Berhasil Menghapus Murid']);
        } catch (Exception $e) {
            return redirect('/detail-class/'. $class->class)->with(['failed' => 'Gagal Menghapus Murid']);
        }
    }
}
