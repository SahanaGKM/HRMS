<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeHolidayController extends Controller
{
    public function index(){
        return view('main.attendance.holidays.employee_holiday');
    }
}
