<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index(){
        return view('main.attendance.employee_management.terminate_process');
    }
}
