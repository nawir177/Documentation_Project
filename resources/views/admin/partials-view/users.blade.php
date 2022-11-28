<div class="rounded-md p-4 bg-white shadow-md mt-5 mx-auto overflow-x-auto">
    <h1 class="text-2xl font-extrabold text-indigo-600 text-center mb-3">All Users</h1>
    <table class="text-left rounded-lg w-full">
        <tr class="border-b text-left">
            <thead class="uppercase text-xs text-slate-400">
                <th class="py-2 pl-3">No</th>
                <th class="py-2 pl-3">Name</th>
                <th class="py-2 pl-3">Email</th>
                <th class="py-2">Status</th>
                <th class="py-2 text-center">Action</th>
            </thead>
        </tr>
        @foreach ($userAll as $user)
            <tr class="border-b text-left text-xs">
                <td class="py-2 px-3">{{ $loop->iteration }}</td>
                <td class="py-2 px-3">{{ $user->name }}</td>
                <td class="py-2 px-3">
                    {{ $user->email }}
                </td>
                <td>{{$user->roles[0]->name}}</td>
                <td class="py-1 px-3 flex justify-center">
                    <div class="flex gap-1">
                        <a href="/profile/{{ $user->id }}/edit"
                            class="bg-blue-600 p-1 flex justify-center rounded-md hover:bg-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5 text-white">
                                <path
                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>

                        </a>
                        <form action="/category/{{ $user->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="bg-red-600 p-1 flex justify-center rounded-md hover:bg-red-800 show_confirm"
                                ata-toggle="tooltip" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5 text-white">
                                    <path fill-rule="evenodd"
                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
