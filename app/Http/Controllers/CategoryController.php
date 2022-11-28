<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Activity;
use App\Models\Icon;
use App\Models\Folder;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
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

        return view('category.category-create', [
            'icons' => Icon::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = Auth()->user()->id;
        $validate = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'icon_id' => 'required',
            'color' => 'required'
        ]);

        Activity::create([
            'user_id'=>$user_id,
            'category'=>'Create',
            'value'=> "Create a new Category with the name ".$validate['name'] 
        ]);

        Category::create($validate);
        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data =  Category::with('folder')->find($id);
        // return dd($data);
        return view('category.category-show', [
            'folders' => $data,
            'category' => Category::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        return view('category.category-edit', [
            'icons' => Icon::all(),
            "category" => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return dd($request);
        if ($request['icon_id'] == null) {
            $request['icon_id'] = $request['icon_id_old'];
        }

        $validate = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'icon_id' => 'required',
            'color' => 'required'
        ]);



        Category::find($id)->update($validate);
        return redirect()->back()->with("succes", "Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Category::destroy($id);

        return redirect()->route('admin')->with("succes", "Category Deleted Successfully");
    }
}
