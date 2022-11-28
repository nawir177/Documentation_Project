<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="container py-12">
        <div class=" md:px-20 py-10 bg-white max-w-7xl mx-auto rounded-xl">
            <h1 class="text-center font-Secular text-[32px] font-bold text-cyan-500">{{ $folders->name }}</h1>
            {{-- button modal  --}}
            <div class="flex w-full justify-between my-10">
                <div class="text-[24px] font-Secular text-cyan-500">Link</div>
                <div class="flex gap-3">
                    <button
                        class="inline-block text-amber-400 border-amber-400 border-2 hover:bg-amber-400 hover:text-white focus:ring-4 focus:outline-none font-medium rounded-xl text-sm font-Secular px-3 py-2 text-center"
                        type="button" data-modal-toggle="rename-modal" >
                        Rename Folder
                    </button>

                    <button
                        class="inline-block text-cyan-500 border-cyan-500 border-2 hover:bg-cyan-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm font-Secular px-5 py-2 text-center"
                        type="button" data-modal-toggle="authentication-modal">
                        Create Link
                    </button>
                </div>

  
            </div>

            
            <div id="rename-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                <div class="relative p-4 md:w-1/2 w-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-toggle="rename-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">
                            <h1
                                class="mb-4 text-2xl font-medium font-Secular text-center text-cyan-500 dark:text-white">
                                Rename Folder</h1>
                            <form class="space-y-6 relative" action="/folder/{{ $folders->id }} " method="POST">
                                @csrf
                                @method('PATCH')
                            
                                <div>
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Folder
                                        Name</label>
                                    <input type="text" required name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Link Name" autocomplete="off" value="{{ $folders->name }}">
                                </div>
                                
                                <div class="flex w-full gap-2 justify-end">
                                    <button type="submit"
                                        class=" text-white bg-cyan-500 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Rename Folder
                                    </button>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal justify-center items-center">
                <div class="relative p-4 md:w-3/4 w-full md:h-auto">
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
                            <h1
                                class="mb-4 text-2xl font-medium font-Secular text-center text-cyan-500 dark:text-white">
                                Create new Link</h1>
                            <form class="space-y-6 relative" action="/data" method="POST">
                                @csrf
                                <input type="hidden" name="folder_id" value="{{ $folders->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="folder_name" value="{{ $folders->name }}">
                                <input type="hidden" name="category_name" value="{{ $category->name }}">
                                <div>
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Link
                                        Name</label>
                                    <input type="text" required name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Link Name" autocomplete="off">
                                </div>
                                <div>
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Link</label>
                                    <input type="text" required name="link" id="link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Link" autocomplete="off">
                                </div>
                                <div>
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Description
                                    </label>
                                    <textarea required id="message" rows="4" name="description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Your Description..."></textarea>

                                </div>
                                <div class="flex w-full gap-2 justify-end">
                                    <button type="submit"
                                        class=" text-white bg-cyan-500 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create
                                        Link
                                    </button>
                                    <button
                                        class="text-white bg-slate-500 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                        data-modal-toggle="authentication-modal">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto relative mt-8 rounded-md bg-gray-50  ">
                <table class="w-full text-sm text-left rounded-md  ">
                    <thead class="text-xs text-gray-700 uppercase">
                        <tr class="text-cyan-500 font-inter text-[16px] border-b">
                            <th scope="col" class="py-4 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-4 px-6">
                                Uploder
                            </th>
                            <th scope="col" class="py-4 px-6">
                                Category
                            </th>
                            <th scope="col" class="py-4 px-6">
                                Description
                            </th>

                            <th scope="col" class="py-4 px-6">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($data as $folder)
                            <tr class="dark:bg-gray-800 border-b font-inter text-gray-400">
                                <td scope="row" class="py-4 px-6">
                                    {{ $folder->name }}
                                </td>
                                <td scope="col" class="py-4 px-6">
                                    {{ $folder->user->name }}
                                </td>

                                <td scope="col" class="py-4 px-6">
                                    {{ $category->name }}
                                </td>
                                <td scope="col" class="py-4 px-6">{{ Str::limit($folder->description, 30, '....') }}
                                </td>

                                <td class="py-4 px-6">

                                    <div class="flex gap-2 mx-auto">
                                        <a href="{{ $folder->link }}" target="_blank"
                                            class="p-1 rounded-lg bg-blue-400 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                    d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z"
                                                    clip-rule="evenodd" />
                                            </svg>



                                        </a>
                                        <a href="/data/{{ $folder->id }}"
                                            class="p-1 rounded-lg bg-green-400 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                    clip-rule="evenodd" />
                                            </svg>


                                        </a>
                                        @if ($folder->user_id == Auth::user()->id)
                                            <form action="/data/{{ $folder->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="bg-red-500 p-1 flex justify-center rounded-lg hover:bg-red-800 show_confirm"
                                                    ata-toggle="tooltip" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-5 h-5 text-white">
                                                        <path fill-rule="evenodd"
                                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>

                                            <a href="/data/{{ $folder->id }}/edit"
                                                class="bg-amber-400 p-1 rounded-lg hover:bg-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-5 h-5 text-white">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                                </svg>

                                            </a>
                                        @endif
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            {{-- end table --}}
            <div class="mt-3 ">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
