    <h1 class="text-2xl my-7 font-Secular text-cyan-500 font-bold">Latest Upload</h1>
    <div class="overflow-x-auto relative shadow rounded-lg">
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
             @foreach ($lastUpload as $value)
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
                     <td class="md:py-2 py-1 md:px-6 px-3">
                         <div class="flex justify-between">
                             <div class="md:w-10 mr-2 md:h-10 w-10 h-10 mx-1 inline-flex rounded-full bg-cover bg-center my-auto"
                                 style="background-image: url('/storage/{{ $value->user->image }}')">
                             </div>
                             <div class="my-auto mr-3 flex-auto w-32">
                                 {{ $value->user->name }}
                             </div>
                             <div class="flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                      stroke-width="1.5" stroke="currentColor" class="w-5 h-5 my-auto ml-3">
                                      <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                  </svg>
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
