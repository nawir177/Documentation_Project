<h1 class="text-2xl mb-7 font-extrabold text-indigo-600">All Link</h1>
<label class="relative block mb-5">
    <span class="sr-only">Search</span>

    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5 h-5 text-indigo-600">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    </span>
    <input
        class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border-none rounded-md h-10 pl-9 pr-3 shadow-md focus:outline-nosm focus:ring-indigo-700 focus:ring-1 text-md sm:text-t"
        placeholder="Search for files..." type="text" name="search" id="search" />
</label>
<div class="mx-auto rounded-md">
    <div class="overflow-x-auto relative shadow rounded-lg max-h-96 overflow-y-scroll">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-slate-400 uppercase bg-white">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Link Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Category
                    </th>
                    <th scope="col" class="py-3 px-6">
                        link
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="allData">
                @foreach ($data as $value)
                    <tr class="bg-white border-b text-gray-800">
                        <td class="py-4 px-6">
                            {{ $value->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $value->folder->category->name }}
                        </td>
                        <td class="py-4 px-6">
                            <a href="{{ $value->link }}" target="__blank"
                                class="py-2 px-3 rounded-md bg-green-500 hover:bg-green-700 shadow text-white">OPEN</a>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex gap-1">
                                <form action="/data/{{ $value->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit"
                                        class=".show_confirm bg-red-600 p-1 flex w-9 justify-center rounded-md hover:bg-red-800 show_confirm"
                                        ata-toggle="tooltip" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6 text-white">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>

                                <a href="/data/{{ $value->id }}/edit"
                                    class="bg-blue-600 p-1 flex w-9 justify-center rounded-md hover:bg-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-6 text-white">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                    </svg>

                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tbody class="searchData" id="Content">
            </tbody>
        </table>
    </div>
</div>
@push('after-scripts')
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value=$(this).val();
            if($value){
                $('.allData').hide();
                $('.searchData').show();
            }else{
                  $('.allData').show();
                $('.searchData').hide();
            }
            $.ajax({
                type:'get',
                url:'{{ URL::to('search_link')}}',
                data:{'search':$value},
  
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endpush
