<?php

namespace App\Http\Controllers;

use App\Models\Bap;
use App\Models\Kelas;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class BapController extends Controller
{

    public function show($id)
    {
        $class = Kelas::where('id', $id)->first();
        $guru = Bap::where('class_id', $id)->first();
        
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
                'guru' => $request['guru_id'],
                'class_id' => $request['class_id']
            ]);

            

            return redirect('/bap/' . $request['class_id'])->with(['success' => 'Bap Berhasil Ditambah']);
        } catch (Exception $e) {
            return redirect('/bap/' . $request['class_id'])->with(['failed' => 'Bap Gagal Ditambah']);
        }
    }

    public function destroy($id)
    {
        try {
            //update data to delete
            Bap::where('id', $id)->delete();

            //redirect to index
            return redirect('/bap/' . 1)->with(['success' => 'Berhasil Menghapus BAP']);
        } catch (Exception $e) {
            return redirect('/bap/' . 1)->with(['failed' => 'Gagal Menghapus BAP']);
        }
    }
}
