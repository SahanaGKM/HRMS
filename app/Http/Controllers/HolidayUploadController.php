<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidayUploadController extends Controller
{
    public function index(){
        return view('main.reports.bulk_uploads.holiday_uploads');
    }
}
