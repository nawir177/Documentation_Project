 <h1 class="text-2xl mb-7 font-extrabold text-cyan-500 font-Secular">Latest Upload</h1>
 <div class="overflow-x-auto relative rounded-lg mr-3">
     <table class="w-full text-sm text-left text-gray-500 ">
         <thead class="text-md font-inter text-cyan-500 uppercase bg-white">
             <tr class="border-b">
                 <th scope="col" class="md:py-3 py-1 md:px-6 px-3">
                     Document name
                 </th>
                 <th scope="col" class="md:py-3 py-1 md:px-6 px-3">
                     Category
                 </th>
                 <th scope="col" class="md:py-3 py-1 md:px-6 px-3">
                     Folder
                 </th>

                 <th scope="col" class="md:py-3 py-1 md:px-6 px-3">
                     Uploder
                 </th>

             </tr>
         </thead>
         <tbody class="allData">
             @foreach ($data as $value)
                 <tr class="bg-white border-b font-inter text-sm text-gray-500">
                     <td class="md:py-6 md:px-6 px-3 flex justify-start gap-3">
                         <div class="flex-none w-6 h-6 my-auto" style="color: {!! $value->folder->category->color !!}">
                             {!! $value->folder->category->icon->value !!}
                         </div>
                         <div class="flex-auto">
                             {{ $value->name }}
                         </div>
                     </td>
                     <td class="md:py-2 py-1 md:px-6 px-3 ">
                         {{ $value->folder->category->name }}
                     </td>
                     <td class="md:py-2 py-1 md:px-6 px-3">
                         {{ $value->folder->name }}
                     </td>
                     <td class="md:py-2 py-1 md:px-6 px-3 relative">
                         <div class="flex justify-between">
                             <div class="md:w-10 mr-2 md:h-10 w-10 h-10 mx-1 inline-flex rounded-full bg-cover my-auto"
                                 style="background-image: url('/storage/{{ $value->user->image }}')">
                             </div>
                             <div class="my-auto mr-10 flex-auto w-32">
                                 {{ $value->user->name }}
                             </div>
                             <div class="flex">
                                 <div
                                     class="selection cursor-pointer text-gray-600 my-auto hover:bg-gray-100 rounded-full w-6 h-6 flex absolute right-0 m-3">
                                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="m-auto">
                                         <path stroke-linecap="round" stroke-linejoin="round"
                                             d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                     </svg>


                                 </div>
                                 {{-- end Selection --}}
                                 {{-- button Detail --}}
                                 <a class="tSelection hidden absolute md:right-16 right-10 text-sm font-semibold px-3 py-2 rounded-md bg-cyan-500 shadow-lg"
                                     href="/data/{{ $value->id }}">
                                     <div class="font-Secular text-white">
                                         Detail
                                     </div>
                                 </a>
                             </div>
                         </div>
                     </td>

                 </tr>
                 @if ($loop->iteration == 5)
                 @break
             @endif
         @endforeach
     </tbody>
     <tbody id="Content" class="searchData"></tbody>
 </table>
</div>
