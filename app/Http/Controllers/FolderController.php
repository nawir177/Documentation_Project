<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\StoreFolderRequest;
use App\Http\Requests\UpdateFolderRequest;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
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
     * @param  \App\Http\Requests\StoreFolderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request['category_id'];

       $validatedData=  $request->validate([
            "name" => "required",
            "category_id" => "required"
        ]);

        Folder::create($validatedData);
        return redirect("/category/$id")->with("succes","New folder added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = Folder::with(['data'])->find($id)->latest();
        $folder = Folder::find($id);
     
        return view('folder.folder-show',[
            "data"=>Data::where('folder_id',$id)->latest()->cursorPaginate(4),
            "category"=>$folder->category,
            "folders"=>$folder
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFolderRequest  $request
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        Folder::find($id)->update([
            'name'=>$request['name']
        ]);
        
        return back()->with('succes','Updated Name Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        //
    }
}
