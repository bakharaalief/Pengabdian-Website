<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index')->with(compact('students'));
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
        try {
            Student::create([
                'name' => $request['name'],
                'gender' => $request['gender'],
                'birth_date' => date("y-m-d", strtotime($request['birth_date'])),
                'semester' => $request['semester'],
                'school' => $request['school']
            ]);

            return redirect(route('student.index'))->with(['success' => 'Murid Berhasil Ditambah']);
        } catch (Exception $e) {
            return redirect(route('student.index'))->with(['failed' => 'Murid Gagal Ditambah']);
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
         //student
         $student = Student::where('id', $id)->first();

         return response()->json([
             'student' => $student,
         ]);
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
        try{
            Student::where('id', $id)->update([
                'name' => $request['name'],
                'gender' => $request['gender'],
                'birth_date' => date("y-m-d", strtotime($request['birth_date'])),
                'semester' => $request['semester'],
                'school' => $request['school'],
            ]);

            return redirect(route('student.index'))->with(['success' => 'Murid Berhasil Diupdate']);
        }

        catch (Exception $e) {
            return redirect(route('student.index'))->with(['failed' => 'Murid Gagal Diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //update data to delete
            Student::where('id', $id)->delete();

            //redirect to index
            return redirect(route('student.index'))->with(['success' => 'Berhasil Menghapus Murid']);
        } catch (Exception $e) {
            return redirect(route('student.index'))->with(['failed' => 'Gagal Menghapus Murid']);
        }
    }
}
