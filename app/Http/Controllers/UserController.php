<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(){
        return view('main.setting.authentication.users');
    }

    public function getBranches($id)
    {
        $branches = Branch::where('company_id', $id)->get();
        return response()->json($branches);
    }

    public function getRoles($companyId, $branchId)
    {
        $roles = Role::where('company_id', $companyId)
                    ->where('branch_id', $branchId)
                    ->get();

        return response()->json($roles);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'c_name' => 'required|exists:companies,id',
            'b_name'  => 'required|exists:branches,id',
            'r_name'  => 'required|exists:roles,id',
            'name'       => [
                'required',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->c_name)
                                    ->where('branch_id', $request->b_name)
                                    ->where('role_id', $request->r_name);
                })->ignore($request->id),
            ],
        ]);

        $user = User::updateOrCreate(
            ['id' => $request->id],
            [
                'company_id' => $request->c_name,
                'branch_id' => $request->b_name,
                'role_id' => $request->r_name,
                'name' => $request->name,
                'password' => $request->password,
                'email' => $request->email,
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $user,
        ]);
    }

    public function edit($id)
    {
        return response()->json(User::findOrFail($id));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function list()
    {
        $roles = User::with(['company', 'branch','role']); // Eager load both

        return DataTables::of($roles)
            ->addColumn('company_name', function ($role) {
                return $role->company->name ?? '-';
            })
            ->addColumn('branch_name', function ($role) {
                return $role->branch->name ?? '-';
            })
            ->addColumn('role_name', function ($role) {
                return $role->branch->name ?? '-';
            })
            ->make(true);
    }
}
