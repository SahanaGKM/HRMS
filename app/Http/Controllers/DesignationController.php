<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(){
        return view('main.attendance.employee_management.designation');
    }
}
