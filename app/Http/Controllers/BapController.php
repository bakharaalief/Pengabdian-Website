<?php

namespace App\Http\Controllers;

use App\Models\Bap;
use App\Models\Kelas;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BapController extends Controller
{

    public function show($id)
    {
        $class = Kelas::where('id', $id)->first();
        
        // cek class-nya ada ga
        if (isset($class)) {
            $baps = Bap::where('class_id', $id)->get();

            return view('bap.index')->with(compact('baps', 'class'));
        } else {
            return redirect(route('bap.index'))->with(['failed' => 'Kelas Tidak DiTemukan']);
        }
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
            Bap::create([
                'materi' => $request['materi'],
                'keterangan' => $request['keterangan'],
                'tanggal' => date("y-m-d", strtotime($request['tanggal'])),
                'user' => Auth::user()->id,
                'class_id' => $request['class_id']
            ]);
            
            return redirect('/bap/' . $request['class_id'])->with(['success' => 'Bap Berhasil Ditambah']);
        } catch (Exception $e) {
            return redirect('/bap/' . $request['class_id'])->with(['failed' => 'Bap Gagal Ditambah']);
        }
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
            Bap::where('id', $id)->update([
                'materi' => $request['materi'],
                'keterangan' => $request['keterangan'],
                'tanggal' => date("y-m-d", strtotime($request['tanggal'])),
                'user' => Auth::user()->id,
            ]);

            return redirect('/bap/' . $request['class_id'])->with(['success' => 'Bap Berhasil Ditambah']);
        }

        catch (Exception $e) {
            return redirect('/bap/' . $request['class_id'])->with(['success' => 'Bap Berhasil Ditambah']);
        }
    }

    public function destroy($id)
    {
        $bap = Bap::where('id', $id)->first();
        try {
            //update data to delete
            Bap::where('id', $id)->delete();

            //redirect to index
            return redirect('/bap/' . $bap->class_id)->with(['success' => 'Berhasil Menghapus BAP']);
        } catch (Exception $e) {
            return redirect('/bap/' . $bap->class_id)->with(['failed' => 'Gagal Menghapus BAP']);
        }
    }

    public function showForm($id)
    {
         //student
         $bap = Bap::where('id', $id)->first();

         return response()->json([
             'bap' => $bap,
         ]);
    }
}
