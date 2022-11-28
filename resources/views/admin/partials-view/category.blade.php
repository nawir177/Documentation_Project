<div class=" overflow-x-auto relative w-full rounded-md bg-white p-3">
    <h1 class="text-2xl mb-7 font-extrabold text-indigo-600">Category Management</h1>
    <div class="mt-3">
        <a class="inline-block text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none mx-auto focus:ring-blue-300 rounded text-sm px-2 py-2 text-center mb-3"
            href="/category/create">
            Create New Category
        </a>

        <table class="text-left bg-white w-full rounded-lg">
            <tr class="border-b text-left">
                <thead class="uppercase text-xs text-slate-400">
                    <th class="py-2 px-10">No</th>
                    <th class="py-2 px-10">Name</th>
                    <th class="py-2 px-10 text-center">Icon</th>
                    <th class="py-2 px-10 text-center">Action</th>
                </thead>
            </tr>
            @foreach ($categories as $category)
                <tr class="border-b text-left">
                    <td class="py-1 px-10">{{ $loop->iteration }}</td>
                    <td class="py-1 px-10">{{ $category->name }}</td>
                    @if ($category->icon != null)
                        <td class="py-1 px-10">
                            <div class="ml-auto w-10 h-10 m-auto" style="color: {{ $category->color }}">
                                {!! $category->icon->value !!}
                            </div>
                        </td>
                    @endif
                    <td class="py-1 px-10 flex justify-center">
                        <div class="flex gap-1">
                            <a href="/category/{{ $category->id }}/edit"
                                class="bg-blue-600 p-1 flex w-9 justify-center rounded-md hover:bg-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-6 text-white">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                </svg>

                            </a>
                            <form action="/category/{{ $category->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
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
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</div>
