<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    public function index(){
        return view('main.attendance.holidays.holiday_list');
    }
}
