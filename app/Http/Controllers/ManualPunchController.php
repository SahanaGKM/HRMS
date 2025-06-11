<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManualPunchController extends Controller
{
    public function index(){
        return view('main.attendance.employee_attendance.manual_punch');
    }
}
