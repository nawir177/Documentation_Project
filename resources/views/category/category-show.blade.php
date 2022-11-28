<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-Secular text-xl text-cyan-500 leading-tight">
            {{ __('category') }}
        </h2>
    </x-slot>
    <div class="container py-12">
        <div class=" md:pt-10 px-1 py-3 bg-white md:max-w-6xl w-[95%] mx-auto rounded-md">
            <h1 class="text-center  text-3xl md:mb-10 font-bold font-Secular text-cyan-500">{{ $category->name }}</h1>

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
                            <form class="space-y-6" action="/folder" method="POST">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $folders->id }}">
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">folder
                                        name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="folder name" autocomplete="off">
                                    @error('folder')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 ">Create
                                    Folder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class=" py-3 md:py-12 px-1">
                    @if ($folders->folder->count() < 1)
                        <p class="text-center my-3">folder not available</p>
                    @endif
                    <div class="flex w-full justify-between px-4 ">
                        <div class="my-auto">
                            <p class="text-center font-Secular  text-cyan-500 text-xl mb-3">Folder</p>
                        </div>
                        @can('post folder')
                            <div class="my-auto">
                                <button
                                    class="border-2 border-cyan-500 hover:bg-cyan-500 hover:text-white focus:ring-4 focus:outline-none mx-auto md:font-medium rounded-lg text-sm md:px-5 px-2 md:py-2.5 py-1.5 text-center text-cyan-500"
                                    type="button" data-modal-toggle="authentication-modal">
                                    Create New folder
                                </button>
                            </div>
                        @endcan

                    </div>
                    <div class="grid grid-cols-4 md:gap-4 gap-5 mt-8 relative">
                        @foreach ($folders->folder as $item)
                            <div class="col justify-center">
                                <a class="inline-block md:flex mx-3 py-2 justify-center md:justify-start md:w-52 bg-amber-400 rounded-lg hover:ring ring-slate-300"
                                    href="/folder/{{ $item->id }}">
                                    <div class="flex md:gap-4 gap-3 md:ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="md:w-8 md:h-8 w-14 h-14 text-white">
                                            <path
                                                d="M19.5 21a3 3 0 003-3v-4.5a3 3 0 00-3-3h-15a3 3 0 00-3 3V18a3 3 0 003 3h15zM1.5 10.146V6a3 3 0 013-3h5.379a2.25 2.25 0 011.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 013 3v1.146A4.483 4.483 0 0019.5 9h-15a4.483 4.483 0 00-3 1.146z" />
                                        </svg>

                                        <p class="font-nunito text-sm my-auto hidden md:block text-white font-inter">
                                            {{ $item->name }}
                                        </p>
                                    </div>
                                    <p class="font-nunito my-auto md:hidden block text-xs mx-auto text-center">
                                        {{ $item->name }}
                                    </p>
                                </a>
                               

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
