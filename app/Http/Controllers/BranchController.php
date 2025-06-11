<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    public function index(){
        return view('main.setting.official.branch');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'c_name' => 'required|exists:companies,id',
            'name'       => [
                'required',
                Rule::unique('branches')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->c_name);
                })->ignore($request->id),
            ],
        ]);

        $company = Branch::updateOrCreate(
            ['id' => $request->id], // Search attributes
            [   // Data to insert/update
                'company_id' => $request->c_name,
                'name' => $request->name,
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
        return response()->json(Branch::findOrFail($id));
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function list()
    {
        $branches = Branch::with('company');

        return DataTables::of($branches)
            ->addColumn('company_name', function ($branch) {
                return $branch->company->name ?? '-';
            })
            ->make(true);
        // return DataTables::of(Branch::query())->make(true);
    }
}
