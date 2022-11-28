<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class notVerifiedController extends Controller
{
    public function index(){
        if(Auth::user()->verified==true){
            return redirect('dashboard');
        }
        return view('verified');
    }
}
