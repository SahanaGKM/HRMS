<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignProjectController extends Controller
{
    public function index(){
        return view('main.assets.projects.assign_projects');
    }
}
