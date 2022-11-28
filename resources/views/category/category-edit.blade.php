<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('category') }}
        </h2>
    </x-slot>
    <div class="container py-12">
        <div class=" px-10 py-7 bg-slate-200 max-w-7xl mx-auto rounded-md">
            <h1>Page View Edit Category</h1>
            <div class="mt-6 w-4xl ">

                <form action="/category/{{ $category->id }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="mb-3">
                        <label for="name" class="mr-3">Category Name</label>
                        <input type="text" name="name" id="name"
                            class="h-8 md:w-1/2 w-full rounded-lg border-none blog mt-1" value="{{ $category->name }}">
                    </div>

                    <div class="mb-3">
                        <input name="icon_id" type="hidden" id="inputField" class="md:w-1/2 bg-white rounded-md mb-3 ring-0 border-none shadow">
                        <input type="hidden" name="icon_id_old" value="{{ $category->icon_id}}">
                        <label for="logo" class="mr-[48px]">Select Icon</label>
                        <div class="md:w-1/2 py-1.5 px-1 rounded-md  bg-white inline-block">
                            <div class="flex justify-between w-full align-content-center" id="selectField">
                              <div class="flex">
                              <div class="mr-6 ml-4" id="preview"></div>
                                <div id="selectText" class="flex my-auto -ml-4"><div class="mr-3">{!! $category->icon->value !!}</div><div class="my-auto">{{ $category->icon->name }}</div></div>
                              
                              </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-4 h-4 text-slate-600 mr-2 my-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                           
                        </div>
                        
                        <div class="bg-white mt-2 rounded-md md:w-1/2 hidden absolute shadow-xl left-[292px]" id="list">
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
                        <label for="name" class="mr-20 inline">Color</label>
                        <input type="color" name="color" id="name" value="{{ $category->color }}" class="h-8 rounded-lg border-none mt-1">
                    </div>

                    <button class="px-3.5 mt-4 py-2 bg-blue-600 hover:bg-blue-800 text-white rounded-lg shadow block"
                        type="submit">Update</button>
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

       
        selectField.onclick = function(){
            list.classList.toggle("hidden");
        }

       
        for(option of options){
            option.onclick = function(){
               selectText.innerHTML = this.querySelector(".iconName").textContent;
               inputField.value=this.querySelector(".id").textContent;
               preview.innerHTML = this.querySelector(".iconValue").innerHTML;
               list.classList.toggle("hidden");
            }
            
        }
    </script>


</x-app-layout>
