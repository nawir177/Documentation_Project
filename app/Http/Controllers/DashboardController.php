<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Data;
use App\Models\User;
use App\Models\Folder;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $output = "";
        $data = Data::where('name', 'like', '%' . $request->search . '%')->with(['user', 'folder'])->latest()->get();

        foreach ($data as $value) {
            $output .=
            '<tr class="bg-white border-b font-inter text-sm text-gray-500">
                <td class="md:py-2 py-1 md:px-6 px-3 ">' . $value->name . '</td>
                <td class="md:py-2 py-1 md:px-6 px-3 ">' . $value->folder->category->name . '</td>
                <td class="md:py-2 py-1 md:px-6 px-3 ">' . $value->folder->name . '</td>
                <td class="md:py-2 py-1 md:px-6 px-3 ">
                    <div class="flex gap-3">                    
                        <div class="flex bg-full justify-between">
                            <div class="w-10 h-10 overflow-clip rounded-full my-auto">
                                <img src="'. asset('storage/'.$value->user->image) . '" alt="" >
                            </div>
                        </div>
                         <div class="my-auto">
                    ' . $value->user->name . '
                        </div>
                    </div>
                </td>
            </tr>';
        }
        return response($output);
    }
    public function index()
    {
        $category = Category::with(['folder'])->get();

        // if ($category->relation->isEmpty()) {
        //     $category =null;
        // }
       
        return view('dashboard.dashboard', [
            'category' => $category,
            'data' => Data::with(['user', 'folder'])->latest()->get(),
            'activity'=>Activity::with('user')->latest()->get()
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
        //
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
        //
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
