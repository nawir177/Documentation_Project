<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            "Update Password"
        </h2>
    </x-slot>
    <div class="container py-12 ">
        <div class=" px-10 py-7 bg-white max-w-2xl mx-auto rounded-md border-2 border-slate-200">
            <h1 class="mb-3 text-2xl font-semibold text-slate-700">Edit Profile</h1>

            <div class="mt-6 w-4xl ">

                <form action="/updatePassword/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="mr-3">Password Old</label>
                        <input type="password" name="passwordOld"
                            class="h-10 w-full rounded border-2 blog mt-1 border-slate-300">
                        @error('oldPassword')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="newPassord" class="mr-3">New Password</label>
                        <input type="password" name="newPassword"
                            class="h-10 w-full rounded border-2 blog mt-1 border-slate-300">
                        @error('newPassword')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="newPassord" class="mr-3">Confirm new Password</label>
                        <input type="password" name="confirm"
                            class="h-10 w-full rounded border-2 blog mt-1 border-slate-300">
                        @error('newPassword')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="px-3.5 mt-4 py-2 bg-blue-600 hover:bg-blue-800 text-white rounded-md shadow"
                        type="submit">Update
                    </button>

                    <a href="{{ route('profile') }}"
                        class="px-3.5 mt-4 py-2 bg-gray-600 hover:bg-gray-800 text-white rounded-md shadow ">Cancel</a>
            </div>
            </form>
        </div>
    </div>
    </div>

</x-app-layout>
//
