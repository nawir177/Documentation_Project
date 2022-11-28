<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Icon;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function search(Request $request)
    {

        $output = "";
        $data = Data::where('name', 'like', '%' . $request->search . '%')->with(['user', 'folder'])->latest()->get();

        foreach ($data as $value) {
            $output .=
                '<tr class="bg-white border-b text-gray-800">
                <td class="py-4 px-6">' . $value->name . '</td>
                 <td class="py-4 px-6">
                            '. $value->folder->category->name.'
                        </td>
                <td class="py-4 px-6">
                     <a href="'. $value->link .'" target="__blank"
                                class="py-2 px-3 rounded-md bg-green-500 hover:bg-green-700 shadow text-white">OPEN</a>
                </td>
            
                <td class="py-4 px-6">
                    <div class="flex gap-1">
                                <form action="/data/' . $value->id . '" method="post">
                                    <input type="hidden" name="_token" value="'.csrf_token(). '" />
                                     <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm()"
                                        class="bg-red-600 p-1 flex w-9 justify-center rounded-md hover:bg-red-800 show_confirm"
                                        ata-toggle="tooltip" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6 text-white">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>

                                <a href="/data/' . $value->id . '/edit"
                                    class="bg-blue-600 p-1 flex w-9 justify-center rounded-md hover:bg-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-6 text-white">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                    </svg>

                                </a>
                    </div>
                </td>
            </tr>';
        }
        return response($output);
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        return view('admin.admin-view', [
            "data" => Data::with('folder')->get(),
            "users" => Auth::user(),
            "verification" => User::where('verified', false)->get(),
            "userAll" => User::with('roles')->get(),
            'categories' => Category::with('icon')->get(),
            "icons" => Icon::all(),
            // "roles"=>Roles::all()

        ]);
    }
    
}
