<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlinePunchController extends Controller
{
    public function index(){
        return view('main.attendance.employee_attendance.online_punch');
    }
}
