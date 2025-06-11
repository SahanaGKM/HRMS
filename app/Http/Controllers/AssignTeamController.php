<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignTeamController extends Controller
{
    public function index(){
        return view('main.setting.assign_employees.assign_team');
    }
}
