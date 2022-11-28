
<x-app-layout>
   
    <div class="container py-12">
        <div class=" md:px-10 px-6 py-7 bg-white max-w-6xl mx-auto rounded-xl shadow-sm">
            <h1 class="md:mb-20 mb-6 md:text-3xl text-xl font-semibold text-cyan-500 font-Secular">Edit Link</h1>

            <div class="mt-6 w-4xl ">

                <form action="/data/{{ $link->id }}" method="POST" class="font-inter text-slate-700">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="folder_name" value="{{ $link->folder->name }}">
                    <input type="hidden" name="category_name" value="{{ $link->folder->category->name }}">
                    <div class="mb-3">
                        <label for="name" class="mr-3">Link Name</label>
                        <input type="text" name="name" id="name" required value="{{ $link->name }}"
                            class="w-full rounded-xl border border-slate-300 shadow-sm blog mt-1 ring-cyan-500">
                        @error('name')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="link" class="mr-3">Link</label>
                        <input type="text" name="link" id="link" required value="{{ $link->link }}"
                            class="w-full rounded-xl border border-slate-300 shadow-sm blog mt-1" >
                        @error('link')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                     <div class="mb-3">
                        <label for="link" class="mb-3">Description</label>
                        <textarea name="description" id="" class="w-full h-36 rounded-xl p-6 border-slate-300">
                            {!! $link->description !!}
                        </textarea>
                        @error('description')
                            <p class="text-sm text-red-600 italic ml-36 my-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <button class="px-3.5 mt-4 py-2 bg-cyan-500 hover:bg-cyan-800 text-white rounded-md shadow"
                        type="submit">SAVE
                    </button>
                   
            </div>
            </form>
        </div>
    </div>
    </div>

</x-app-layout>
//
