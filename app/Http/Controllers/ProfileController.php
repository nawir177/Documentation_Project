<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDataRequest;
use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Contracts\Role;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        return view('profile.profile-view', [
            "data" => Data::where('user_id', $user_id)->with('folder')->latest()->get(),
            "user" => User::with('roles')->find($user_id),
            "lastUpload" => Data::with(['folder', 'user'])->latest()->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = User::find($id)->id;
        $user_login = Auth()->user()->id;
        if($user_login == $user_id){
            return view('profile.profile-edit', [
                "user" => User::with('roles')->find($id)
            ]);
        }else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $role = User::find($id)->getRoleNames()[0];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'file', 'max:1000']
        ]);

        if ($request['image'] == false) {
            $img = $request['old_image'];
        } else {

            Storage::delete($request['old_image']);
            $img = $request->file('image')->store('user-images');
        }

        if ($request['role_id'] == false) {
            $request['role_id'] = $request['old_role'];
        }


        User::find($id)->update([
            "name" => $request['name'],
            "email" => $request['email'],
            "image" => $img
        ]);
        DB::table('model_has_roles')->where('model_id', "$id")->update([
            "role_id" => $request['role_id']
        ]);
        if ($role == "admin") {
            return redirect()->route('admin')->with('succes', 'Updated Profile Successfuly');
        }
        return redirect()->route('profile')->with('succes', 'Updated Profile Successfuly');
    }


    public function editPassword()
    {

        $id = auth()->user()->id;

        return view('profile.profile-editPassword', [
            "user" => User::find($id)
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            "passwordOld" => "required|min:8",
            "newPassword" => "required|min:8",
            "confirm" => "required|min:8",
        ]);

        $passwordNew = Hash::make($validated['newPassword']);

        if (Hash::check($validated['passwordOld'], $user->password)) {

            if ($validated['newPassword'] == $validated['confirm']) {
                $user->update([
                    "password" => $passwordNew
                ]);

                return redirect()->route('profile')->with('succes', 'Password Updated Successfuly');
            } else {
                return redirect()->route('editPassword')->with('failed', ['Password Failed to Update', 'your Confirm Password Filed']);
            }
        } else {
            return redirect()->route('editPassword')->with('failed', ['Password Failed to Update', 'your Password Old Filed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
