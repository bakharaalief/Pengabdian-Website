<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students_amount = Student::count();
        $teachers_amount = User::where('user_level', 2)->count();
        $sukarelawan_amount = User::where('user_level', 3)->count();
        $class_amount = Kelas::count();
        return view('admin.home')->with(compact('students_amount', 'teachers_amount', 'sukarelawan_amount', 'class_amount'));
    }
}
