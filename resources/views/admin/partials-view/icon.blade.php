<div class="rounded-md p-4 bg-white shadow-md mt-5">
    <h1 class="text-2xl font-extrabold text-indigo-600 text-center mb-3">ICON MANGEMENT</h1>
    {{-- modal create icon --}}
    <button
        class="inline-block text-white mb-3 bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none mx-auto focus:ring-blue-300 text-sm rounded-sm px-3 py-1 text-center"
        type="button" data-modal-toggle="authentication-modal">
        Create New Icon
    </button>
     <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-toggle="authentication-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="py-6 px-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create new folder</h3>
                                <button onclick="return iconPreview">ubah</button>
                                <form class="space-y-6" action="/icon" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div>
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Icon
                                            Name</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="folder name" autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="value"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Value</label>
                                        <input type="text" name="value" id="inputIcon"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="input with svg format" autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <p class="" id="iconPreview"></p>
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 ">Create
                                        Icon
                                    </button>
                                </form>                            </div>
                        </div>
                    </div>
                </div>
    {{-- end creat icon --}}
    <table class="text-left rounded-lg w-full">
        <tr class="border-b text-left">
            <thead class="uppercase text-xs text-slate-400">
                <th class="py-2 pl-3">No</th>
                <th class="py-2 pl-3">Icon Name</th>
                <th class="py-2 pl-3">Icon</th>
                <th class="py-2 text-center">Action</th>
            </thead>
        </tr>
        @foreach ($icons as $icon)
            <tr class="border-b text-left text-xs">
                <td class="py-2 px-3">{{ $loop->iteration }}</td>
                <td class="py-2 px-3">{{ $icon->name }}</td>
                <td class="py-2 px-3">{!! $icon->value !!}</td>
                <td class="py-1 px-3 flex justify-center">
                    <div class="flex gap-1">
                        <a href="/icon/{{ $icon->id }}/edit"
                            class="bg-blue-600 p-1 flex justify-center rounded-md hover:bg-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5 text-white">
                                <path
                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>

                        </a>
                        <form action="/icon/{{ $icon->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class=".show_confirm bg-red-600 p-1 flex justify-center rounded-md hover:bg-red-800 show_confirm"
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
