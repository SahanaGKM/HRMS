<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MachinePunchController extends Controller
{
    public function index(){
        return view('main.attendance.employee_attendance.machine_punch');
    }
}
