<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        return view('main.attendance.employee_management.upload_docs');
    }
}
