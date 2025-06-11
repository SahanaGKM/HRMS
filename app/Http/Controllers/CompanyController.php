<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    public function index(){
        return view('main.setting.official.company');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:companies,name,' . $request->id,
        ]);

        $company = Company::updateOrCreate(
            ['id' => $request->id], // Search attributes
            [   // Data to insert/update
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'website' => $request->website,
                'status' => $request->status,
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $company,
        ]);
    }

    public function edit($id)
    {
        return response()->json(Company::findOrFail($id));
    }

    public function destroy($id)
    {
        Company::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function list()
    {
        return DataTables::of(Company::query())->make(true);
    }
}
