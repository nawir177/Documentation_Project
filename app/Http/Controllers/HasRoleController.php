<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasRoleController extends Controller
{
    public function updateRoles(Request $request)
    {

        // return $request;
        $harRole = DB::table('model_has_roles');

        if ($request->status == 'magang') {
            $role = 3;
        }elseif($request->status == 'karyawan'){
            $role = 2;
        }elseif($request->status == 'admin'){
            $role = 1;
        };

        $harRole->where('model_id', "$request->id")->update([
            "role_id" => $role
        ]);

        User::find($request->id)->update([
            "verified" => 1
        ]);

        return response()->json($request->id);

        // return $request;
        // return redirect()->route('admin')->with("succes", "User Verification Successfuly...");
    }
}
