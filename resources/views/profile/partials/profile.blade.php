    <h1 class="text-2xl mb-7 font-Secular font-bold text-cyan-500 text-center">Profile</h1>
    <div class="bg-white shadow-md rounded-md p-3">
        <div class="mx-auto rounded-xl w-36 h-48 bg-cover bg-center mt-3 block"
            style='background-image: url("/storage/{{ Auth::user()->image }}")'>
        </div>
        <div class="p-3">
            <ul class="list-none mb-3">
                <li class="py-3 px-1 rounded-md bg-slate-100 border text-slate-800 flex mb-3 text-sm ">
                    <div class="font-semibold flex w-[35%]">
                        Nama
                    </div>
                    <div class="font-semibold">
                        : {{ $user->name }}
                    </div>
                </li>
                <li class="py-3 px-1 rounded-md bg-slate-100 border text-slate-800 flex mb-3 text-sm">
                    <div class="font-semibold flex w-[35%]">
                        Status
                    </div>
                    <div class="font-semibold">
                        : {{ $user->roles[0]->name }}
                    </div>
                </li>
                <li class="py-3 px-1 rounded-md bg-slate-100 border text-slate-800 flex mb-3 text-sm ">
                    <div class="font-semibold flex w-[35%]">
                        Email
                    </div>
                    <div class="font-semibold">
                        : {{ Auth::user()->email }}
                    </div>
                </li>
            </ul>
            <a href="/profile/{{ Auth::user()->id }}/edit"
                class="py-2 px-3 bg-slate-500 inline-block text-white text-center rounded-md mt-2 hover:bg-slate-900">Edit
                Profile
            </a>
            <a href="{{ route('editPassword') }}"
                class="py-2 px-3 bg-red-600 inline-block text-white text-center rounded-md mt-2 hover:bg-red-900">Update
                Password
            </a>
        </div>
    </div>
