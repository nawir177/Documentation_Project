    <h1 class="text-2xl pt-5 font-extrabold text-indigo-600 text-center mb-3">Profile</h1>
    <div class="bg-white shadow-md rounded-md p-3">
        <div class="mx-auto rounded-xl w-36 h-40 bg-cover bg-center mt-3 block"
            style='background-image: url("/storage/{{ Auth::user()->image }}")'>
        </div>
        <div class="px-1 py-2">
            <ul class="list-none mb-3 text-[10px]">
                <li class="p-1 rounded-md bg-slate-100 border text-slate-800 flex mb-3 ">
                    <div class="font-semibold flex w-[25%]">
                        Nama
                    </div>
                    <div class="font-semibold">
                        : {{ Auth::user()->name }}
                    </div>
                </li>
                <li class="p-1 rounded-md bg-slate-100 border text-slate-800 flex mb-3">
                    <div class="font-semibold flex w-[25%]">
                        Status
                    </div>
                    <div class="font-semibold">
                        : {{ Auth::user()->status }}
                    </div>
                </li>
                <li class="p-1 rounded-md bg-slate-100 border text-slate-800 flex mb-3 ">
                    <div class="font-semibold flex w-[25%]">
                        Email
                    </div>
                    <div class="font-semibold">
                        : {{ Auth::user()->email }}
                    </div>
                </li>
            </ul>
            <a href=""
                class="py-1 px-2 bg-slate-500 inline-block text-white text-center rounded-md mt-2 hover:bg-slate-900 text-xs">Edit
                Profile
            </a>
        </div>
    </div>
