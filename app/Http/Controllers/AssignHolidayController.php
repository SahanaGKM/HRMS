<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignHolidayController extends Controller
{
    public function index(){
        return view('main.setting.assign_employees.assign_holiday');
    }
}
