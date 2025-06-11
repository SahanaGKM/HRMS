<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeavePolicyController extends Controller
{
    public function index(){
        return view('main.attendance.leaves.leave_policy');
    }
}
