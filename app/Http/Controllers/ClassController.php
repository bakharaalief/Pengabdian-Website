<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\StudyTime;
use Exception;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Kelas::all();
        $studyTime = StudyTime::all();
        return view('class.index')->with(compact('classes', 'studyTime'));
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
            Kelas::create([
                'name' => $request['name'],
                'study_time' => $request['study_time'],
            ]);

            return redirect(route('class.index'))->with(['success' => 'Kelas Berhasil Ditambah']);
        } catch (Exception $e) {
            return redirect(route('class.index'))->with(['failed' => 'Kelas Gagal Ditambah']);
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
        //class
        $class = Kelas::where('id', $id)->first();

        return response()->json([
            'class' => $class,
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
            Kelas::where('id', $id)->update([
                'name' => $request['name'],
                'study_time' => $request['study_time'],
            ]);

            return redirect(route('class.index'))->with(['success' => 'Kelas Berhasil Diupdate']);
        }

        catch (Exception $e) {
            return redirect(route('class.index'))->with(['failed' => 'Kelas Gagal Diupdate']);
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
            Kelas::where('id', $id)->delete();

            //redirect to index
            return redirect(route('class.index'))->with(['success' => 'Berhasil Menghapus Kelas']);
        } catch (Exception $e) {
            return redirect(route('class.index'))->with(['failed' => 'Gagal Menghapus Kelas']);
        }
    }
}
