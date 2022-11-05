<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLevel;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::Where('id', '!=', 1)->get();
        $userLevels = UserLevel::all()->except(1);

        return view('user.index')->with(compact('users', 'userLevels'));
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
            //check data if exist in db
            $cekAda = User::where('username', $request['username'])->first();

            if (isset($cekAda)) {
                return redirect(route('user.index'))->with(['failed' => 'Gagal Menambahkan karena user sudah terdaftar']);
            }

            User::create([
                'name' => $request['name'],
                'username' => $request['username'],
                'password' => bcrypt($request['password']),
                'user_level' => $request['user_level']
            ]);
            
            return redirect(route('user.index'))->with(['success' => 'User Berhasil Ditambah']);
        } catch (Exception $e) {
            return redirect(route('user.index'))->with(['failed' => 'User Gagal Ditambah']);
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
        //user
        $user = User::where('id', $id)->first();

        return response()->json([
            'user' => $user,
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
            //check data if exist in db
            $cekAda = User::where('username', $request['username'])->first();

            if($request['password'] == ''){
                User::where('id', $id)->update([
                    'name' => $request['name'],
                    'user_level' => $request['user_level']
                ]);
            } 
            
            else{
                User::where('id', $id)->update([
                    'name' => $request['name'],
                    'password' => bcrypt($request['password']),
                    'user_level' => $request['user_level']
                ]);
            }

            return redirect(route('user.index'))->with(['success' => 'User Berhasil Diupdate']);
        }

        catch (Exception $e) {
            return redirect(route('user.index'))->with(['failed' => 'User Gagal Diupdate']);
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
            //update data to delete false
            User::where('id', $id)->delete();

            //redirect to index
            return redirect(route('user.index'))->with(['success' => 'Berhasil Menghapus User']);
        } catch (Exception $e) {
            return redirect(route('user.index'))->with(['failed' => 'Gagal Menghapus User']);
        }
    }
}
