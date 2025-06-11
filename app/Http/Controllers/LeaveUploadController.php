<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveUploadController extends Controller
{
    public function index(){
        return view('main.reports.bulk_uploads.leave_uploads');
    }
}
