<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(){
        return view('main.attendance.employee_management.roles');
    }
    public function getBranches($id)
    {
        $branches = Branch::where('company_id', $id)->get();
        return response()->json($branches);
    }
    public function store(Request $request)
    {
        $request->validate([
            'c_name' => 'required|exists:companies,id',
            'b_name'  => 'required|exists:branches,id',
            'name'       => [
                'required',
                Rule::unique('roles')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->c_name)
                                 ->where('branch_id', $request->b_name);
                })->ignore($request->id),
            ],
        ]);

        $role = Role::updateOrCreate(
            ['id' => $request->id],
            [
                'company_id' => $request->c_name,
                'branch_id' => $request->b_name,
                'name' => $request->name,
                'guard_name' => 'web',
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $role,
        ]);
    }

    public function edit($id)
    {
        return response()->json(Role::findOrFail($id));
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function list()
    {
        $roles = Role::with(['company', 'branch']); // Eager load both

        return DataTables::of($roles)
            ->addColumn('company_name', function ($role) {
                return $role->company->name ?? '-';
            })
            ->addColumn('branch_name', function ($role) {
                return $role->branch->name ?? '-';
            })
            ->make(true);
    }
}
