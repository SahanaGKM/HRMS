<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignAssetController extends Controller
{
    public function index(){
        return view('main.assets.assets.assign_asset');
    }
}
