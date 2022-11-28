<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            "Edit Proile"
        </h2>
    </x-slot>
    <div class="container py-12">
        <div class=" px-10 py-7 bg-slate-300 max-w-2xl mx-auto rounded-md">
            <h1 class="mb-3 text-2xl font-semibold text-slate-700">Edit Profile</h1>

            <div class="mt-6 w-4xl ">

                <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="mr-3">Name</label>
                        <input type="text" name="name" id="name" required value="{{ $user->name }}"
                            class="h-10 w-full rounded border-2 blog mt-1 border-slate-300">
                        @error('name')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="link" class="mr-3">Email</label>
                        <input type="text" name="email" id="link" required value="{{ $user->email }}"
                            class="h-10 w-full rounded border-2 blog mt-1 border-slate-300">
                        @error('email')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="hidden" name="old_role" value="{{ $user->roles[0]->id }}">
                    @role('admin')
                        <div class="mb-3">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an
                                option</label>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="role_id">
                                <option value="3" {{ $user->getRoleNames()[0] == 'magang'? 'selected': '' }}>
                                    Magang
                                </option>
                                <option value="2"
                                    {{ $user->getRoleNames()[0] == 'karyawan'? 'selected': '' }}>
                                    Karyawan
                                </option>
                                <option value="1" {{ $user->getRoleNames()[0] == 'admin'? 'selected': '' }}>
                                    Admin
                                </option>

                            </select>
                        </div>
                    @endrole
                    <div class="md-3">

                        <img src="{{ asset('storage/' . $user->image) }}" id="img_old" alt="" width="200px"
                            class="mb-3">
                        <img class="img-preview img-fluid my-3" width="200px">
                        <input
                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none   dark:placeholder-gray-400"
                            id="gambar" type="file" onchange="previewImage()" name="image">
                             @error('image')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror

                    </div>
                    <input type="hidden" name="old_image" value="{{ $user->image }}">
                    <button class="px-3.5 mt-4 py-2 bg-blue-600 hover:bg-blue-800 text-white rounded-md shadow"
                        type="submit">Update
                    </button>
                    <a href="{{ route('profile') }}"
                        class="px-3.5 mt-4 py-2 bg-gray-600 hover:bg-gray-800 text-white rounded-md shadow ">Cancel
                    </a>
            </div>
            </form>
        </div>
    </div>
    </div>

</x-app-layout>
//

