<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackAssetController extends Controller
{
    public function index(){
        return view('main.assets.assets.track_asset');
    }
}
