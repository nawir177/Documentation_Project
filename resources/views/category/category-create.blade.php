@can('edit category')


    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('category') }}
            </h2>
        </x-slot>
        <div class="container py-12">
            <div class=" px-10 py-7 bg-slate-200 shadow-md max-w-4xl mx-auto rounded-md">
                <h1 class="mb-3 text-3xl text-center font-semibold">Crete Category</h1>
                {{-- MAIN MODAL --}}
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
                                        Folder
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END MODAL --}}
                <button
                    class="inline-block text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none mx-auto focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center"
                    type="button" data-modal-toggle="authentication-modal">
                    Create New Icon
                </button>
                <div class="mt-6 w-4xl ">

                    <form action="/category" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="name" class="mr-3">Category Name</label>
                            <input type="text" name="name" id="name" required
                                class="h-8 md:w-1/2 w-full rounded-md border-none blog mt-1">
                            @error('name')
                                <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input name="icon_id" type="hidden" id="inputField"
                                class="md:w-1/2 bg-white rounded-md mb-3 ring-0 border-none shadow">
                            <label for="logo" class="mr-[48px]">Select Icon</label>
                            <div class="md:w-1/2 py-1.5 px-1 rounded-md  bg-white inline-block">
                                <div class="flex justify-between w-full align-content-center" id="selectField">
                                    <div class="flex">
                                        <div class="mr-6 ml-4" id="preview"></div>
                                        <div id="selectText" class="flex my-auto -ml-4">Create Icon</div>

                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-slate-600 mr-2 my-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </div>
                            </div>
                            <div class="bg-white mt-2 rounded-md md:w-1/4 hidden absolute shadow-xl left-[482px]"
                                id="list">
                                <ul class=" p-1 ">
                                    @foreach ($icons as $icon)
                                        <li class="options flex w-full cursor-pointer border-b hover:bg-slate-100 py-1">
                                            <p class="iconValue mr-3">{!! $icon->value !!}</p>
                                            <p class="iconName">{{ $icon->name }}</p>
                                            <p class="id hidden">{{ $icon->id }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3 flex w-full">
                            <label for="name" class="mr-20da inline">Color</label>
                            <input type="color" name="color" id="name" class="h-8 rounded-lg border-none mt-1">
                        </div>

                        <button class="px-3.5 mt-4 py-2 bg-blue-600 hover:bg-blue-800 text-white rounded-lg shadow block"
                            type="submit">Create</button>
                </div>
                </form>
            </div>
        </div>
        </div>

        <script>
            let selectField = document.querySelector("#selectField");
            let preview = document.querySelector("#preview");
            let inputField = document.querySelector("#inputField");
            let selectText = document.querySelector("#selectText");
            let options = document.getElementsByClassName("options");
            let list = document.querySelector("#list");
            let iconPreview = document.querySelector("#iconPreview");
            let inputIcon = document.querySelector("input#inputIcon");


            inputIcon.addEventListener('input', function() {
                let text = this.value;
                iconPreview.innerHTML = text;
            });




            selectField.onclick = function() {
                list.classList.toggle("hidden");
            }

            for (option of options) {
                option.onclick = function() {
                    selectText.innerHTML = this.querySelector(".iconName").textContent;
                    inputField.value = this.querySelector(".id").textContent;
                    preview.innerHTML = this.querySelector(".iconValue").innerHTML;
                    list.classList.toggle("hidden");
                }

            }
        </script>


    </x-app-layout>
    //
@endcan
