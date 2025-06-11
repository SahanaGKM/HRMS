<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackProjectController extends Controller
{
    public function index(){
        return view('main.assets.projects.track_projects');
    }
}
