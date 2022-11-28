<div class="rounded-md p-4 bg-white shadow-md mt-16">
    <h1 class="text-2xl font-extrabold text-indigo-600 text-center mb-3">Verfication Request User</h1>
    <table class="text-left rounded-lg w-full">
        <tr class="border-b text-left">
            <thead class="uppercase text-xs text-slate-400">
                <th class="py-2 pl-3">No</th>
                <th class="py-2 pl-3">Name</th>
                <th class="py-2 pl-3">Email</th>
                <th class="py-2">Action</th>
            </thead>
        </tr>
        @foreach ($verification as $user)
            <tr class="border-b text-left text-xs" id="this_id_user_{{ $user->id }}">
                <td class="py-2 px-3">{{ $loop->iteration }}</td>
                <td class="py-2 px-3">{{ $user->name }}</td>
                <td class="py-2 px-3">
                    {{ $user->email }}
                </td>
                <td class="">

                    {{-- <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label> --}}
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p d-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        onchange="updateStatus({{ $user->id }}, this.value)">
                        <option selected=""><div>Verfication</div></option>

                        <option value="magang">magang</option>
                        <option value="karyawan">kaywan</option>
                        <option value="admin">admin</option>
                    </select>

                </td>
                {{-- <td class="selectField">
                    <div class="flex cursor-pointer">
                        <div class="preview mr-3" id="">
                            status
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 text-slate-600 mr-2 my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    <div
                        class="list absolute hidden w-52 bg-slate-50 shadow-2xl border-2 border-slate-200 rounded-md mt-3">
                        <ul>
                            <li class="options mb-1 p-2 border-b hover:bg-slate-300 cursor-pointer" onclick="updateStatus({{ $user->id }}, `magang`)" id="status-magang-{{ $user->id }}">
                                Magang</li>
                            <li id="status-karyawan-{{ $user->id }}" class="options mb-1 p-2 border-b hover:bg-slate-300 cursor-pointer" onclick="updateStatus({{ $user->id }}, `karyawan`)">
                                Karyawan</li>
                            <li id="status-karyawan-{{ $user->id }}" class="options mb-1 p-2 border-b hover:bg-slate-300 cursor-pointer" onclick="updateStatus({{ $user->id }}, `admin  `)">Admin
                            </li>
                        </ul>
                    </div>
                </td> --}}
                {{-- <td class="py-2 px-3 text-center">
                    <form action="/upadateRoles/{{ $user->id }}" method="post">
                        @csrf
                        <input type="hidden" name="verified" value="1">
                        <input type="hidden" name="status" id="inputField" value="3">
                        <button type="submit"
                            class="py-1 px-2 bg-green-600 text-white rounded-md hover:bg-green-800">Verifiation</button>
                    </form>
                </td> --}}
            </tr>
        @endforeach
    </table>
</div>

<script>
    // let selectField = document.querySelectorAll(".selectField");

    // for (select of selectField) {
    //     select.onclick = function() {
    //         let list = select.querySelector(".list");
    //         let options = select.getElementsByClassName("options");
    //         let preview = select.querySelector(".preview");
    //         let inputField = select.querySelector("#inputField");

    //         list.classList.toggle("hidden");

    //         for (option of options) {
    //             option.onclick = function() {
    //                 preview.innerHTML = this.textContent;
    //                 inputField.value = this.getAttribute("id");;
    //                 list.classList.toggle("hidden");
    //             }
    //         }
    //     }

    //     let list = select.querySelector(".list");
    //     let preview = select.querySelector(".preview");


    // }
</script>

@push('after-scripts')
    <script>
        function updateStatus(id, status) {
            console.log(id);
            console.log(status);
            $.ajax({
                type: "post",
                url: "{{ route('updateRoles') }}",
                data: {
                    '_token':`{{ csrf_token() }}`,
                    'id': id,
                    'status': status,
                },
                success: function(data) {
                    $('#this_id_user_'+data).hide();
                }
            });
        }
    </script>
@endpush
