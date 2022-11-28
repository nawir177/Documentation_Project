<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;

class CommentController extends Controller
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
     * @param  \App\Http\Requests\StorecommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
        $validated = $request->validate([
            'value' => 'required'
        ]);


        Comment::create([
            "data_id" => $request['data_id'],
            "user_id" => Auth()->user()->id,
            "value" => $validated['value']
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecommentRequest  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    
        $validated = $request->validate([
            'value' => 'required'
        ]);

        $user_login = Auth()->user()->id;

        if($user_login == $request['user_id']){
            Comment::find($id)->update([
                "value" => $validated['value']
            ]);

            return back();
        }else{
            return back()->with('failed', ['Comment Failed to Update', 'your Confirm Not Users']);
        }
      
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user_login = Auth()->user()->id;
        
        if ($user_login == $request['user_id']) {
            Comment::destroy($id);
            return back();
        } else {
            return back()->with('failed', ['Comment Failed Deleted', 'your Not Users']);
        }
        return back()->with("succes", "Comment Deleted Successfuly...");
    }
}
