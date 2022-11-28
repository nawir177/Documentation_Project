<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('icon') }}
        </h2>
    </x-slot>
    <div class="container py-12">
        <div class=" px-10 py-7 bg-slate-200 max-w-7xl mx-auto rounded-md md:w-1/2">
            <h1>Edit Icon</h1>
            <div class="mt-6 w-4xl ">

                <form class="space-y-6" action="/icon/{{ $icon->id }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Icon
                            Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="folder name" autocomplete="off" value="{{ $icon->name }}">
                    </div>
                    <div>
                        <label for="value"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Value</label>
                        <input type="text" name="value" id="inputIcon"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="input with svg format" autocomplete="off" value="{{ $icon->value }}">
                    </div>

                    <div class="mb-3">
                        <p class="" id="iconPreview"></p>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 ">Update
                        Icon
                    </button>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>

<script>
      let inputIcon = document.querySelector("input#inputIcon");
    
      iconPreview.innerHTML = inputIcon.value;

            inputIcon.addEventListener('input', function() {
                let text = this.value;
                iconPreview.innerHTML = text;
            });

</script>
