<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function index(){
        return view('main.attendance.leaves.employee_leaves');
    }
}
