<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Data;
use App\Models\User;
use App\Models\Folder;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateDataRequest;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Http\Requests\StoreDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_id = Data::latest()->first();
        $data_id = $data_id->id+1;
        Carbon::setLocale('id');
        $user_id = Auth()->user()->id;
        $id = $request['folder_id'];
        Data::create([
            "user_id" => $request['user_id'],
            "folder_id" => $request['folder_id'],
            "name" => $request['name'],
            'link' => $request['link'],
            'description' => $request['description'],
            'date'=>Carbon::now()->format('d F Y')
        ]);

        Activity::create([
            'user_id' => $user_id,
            'category' => 'Create link',
            'value' => "Create a new Link with the name " . $request['name'],
            'directory' => $request['category_name'] . " / " . $request['folder_name'],
            'data_id'=>$data_id
        ]);

        return redirect("/folder/$id")->with("succes", "New Link added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Data::with('comment')->find($id);
        return view('link.show-link', [
            "data" => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  Data::with(['folder'])->find($id);


        $dataUser = $data->user->id;
        $id_user = auth()->user()->id;
        $role = User::find($id_user)->getRoleNames()[0];

        if ($dataUser == $id_user || $role == 'admin') {
            return view('link.edit-link', [
                "link" => $data
            ]);
        } else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataRequest  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       
        $user_id = Auth::user()->id;
        $role = User::find($user_id)->getRoleNames()[0];
        $link = Data::find($id);
        $request->validate([
            "name"=>'required',
            "link"=>'required',
            'description'=>'required'
        ]);

        $link->update([
            "name" => $request['name'],
            "link" => $request['link'],
            'description'=>$request['description']
        ]);

        Activity::create([
            'user_id' => $user_id,
            'category' => 'Updated link',
            'value' => "Updated Link with name " . $request['name'] . " in directory " .
                $request['category_name'] . " / " . $request['folder_name'],
            'directory' => $request['category_name'] . " / " . $request['folder_name'],
            'data_id'=>$link->id
        ]);

        if ($role == "admin") {
            return redirect()->route('admin')->with('succes', 'Link Updated Successfully');
        }
        return redirect()->route('profile')->with('succes', 'Link Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Data::destroy($id);
        return back()->with("succes", " Link Deleted Successfully...");
    }
}
