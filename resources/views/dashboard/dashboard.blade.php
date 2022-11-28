<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            "Dashboard"
        </h2>
    </x-slot>
    <div class="container py-12 ">

        <div class="mx-auto sm:px-6 lg:pl-20 ">
            <div class="grid md:grid-cols-12 grid-cols-1">
                <div class="md:col-span-8 mx-5">
                    <div class="col-auto pr-9 mb-5">
                        <div class="mx-auto">
                            <label class="relative mb-5">
                                <span class="sr-only">Search</span>

                                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-cyan-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </span>
                                <input
                                    class="placeholder:italic placeholder:text-slate-400 h-12 block bg-white w-full border-none rounded-xl pl-9 pr-3 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                    placeholder="Search for files..." type="text" name="search" id="search" />
                            </label>
                        </div>
                    </div>
                    <div class="col-auto mb-5">
                        @include('dashboard.partials.category')
                    </div>
                    <div class="col-auto mb-5">
                        @include('dashboard.partials.latest_upload')
                    </div>
                    <div class="col-auto mt-4">
                        @include('dashboard.partials.shere')
                    </div>
                </div>
                <div class="group md:col-span-4 col-auto mb-24 relative">
                    <div class="md:fixed inline only-of-type: md:pr-12 md:max-h-screen md:overflow-y-auto">
                        <div class="col-auto mb-5 p-3">
                            <h1 class="text-2xl font-extrabold font-Secular text-cyan-500">Status</h1>
                            <div class="p-4 bg-cyan-500 rounded-lg mt-3 ">
                                <p class="text-white">Cloud Storage Opacity</p>
                                <div class="w-full rounded-full h-3 bg-slate-200">
                                    <div class="w-[50%] h-3 bg-yellow-300 rounded-full"></div>
                                </div>
                                <div class="flex justify-between">
                                    <p class="opacity-50 text-xs text-white mt-5">9GB left</p>
                                    <p class="opacity-50 text-xs text-white mt-5">50%</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="opacity-50 text-xs text-white mt-5">160 files</p>
                                    <p class="opacity-50 text-xs text-white mt-5">10 public files</p>
                                    <p class="opacity-50 text-xs text-white mt-5">7 Members</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto p-3 pb-48">
                            @include('dashboard.partials.activity')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    let icon = document.querySelectorAll("svg.w-6");
    for (let i = 0; i < icon.length; i++) {
        icon[i].removeAttribute("class");
    }
</script>
