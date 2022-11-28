<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIconRequest;
use App\Http\Requests\UpdateIconRequest;

class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreIconRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "user_id" => "required",
            "value" => "required"
        ]);
        Icon::create($validated);
        return redirect("/category/create")->with("succes", "Icon Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function show(Icon $icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view("icon.icon-edit", [
            "icon" => Icon::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIconRequest  $request
     * @param  \App\Models\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($request->user_id);
        $roleName = $user->getRoleNames()[0];
        $validated = $request->validate([
            "name" => "required",
            "user_id" => "required",
            "value" => "required"
        ]);
        Icon::find($id)->update($validated);
        if ($roleName == "admin") {
            return redirect("/admin")->with("succes", "Icon Added Successfully");
        }
        return redirect("/icon/create")->with("succes", "Icon Added Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cek icon

        $icon = Icon::find($id);


        if ($icon->category->count() >0) {
            return back()->with("failed", ["Icon not deleted!", "Icon Sedang di Pakai"]);
        } else {
            $icon->delete();
            return back()->with("succes", "Icon Successfully deleted!");
        }
    }
}
