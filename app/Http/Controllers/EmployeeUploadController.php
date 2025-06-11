<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeUploadController extends Controller
{
    public function index(){
        return view('main.reports.bulk_uploads.employee_uploads');
    }
}
