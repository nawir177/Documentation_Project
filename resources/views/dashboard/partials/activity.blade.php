<h1 class="text-2xl font-extrabold text-cyan-500 font-Secular">Activities</h1>
@foreach ($activity as $value)
    {{-- Selection --}}
    <div class="grid bg-white rounded-xl mt-3 p-6 relative w-full">
        <div
            class="selection cursor-pointer text-gray-600 hover:bg-gray-100 rounded-full w-6 h-6 flex absolute right-0 m-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="m-auto">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
            </svg>

            
        </div>
        {{-- end Selection --}}
        {{-- button Detail --}}
        <a class="tSelection hidden absolute md:-right-16 right-10 text-sm font-semibold px-3 py-2 rounded-md bg-white shadow-lg" href="/data/{{ $value->data_id }}">
            <div class="font-Secular">
                Detail
            </div>
        </a>
        {{-- end button detail --}}

        <div class="md:flex gap-4 mb-3">
            <div class="w-10 h-10 bg-red-700 rounded-full bg-cover bg-top"
                style="background-image: url({{ asset('storage/' . $value->user->image) }})">
            </div>
            <div class="font-inter">
                <div class="text-sm font-bold">{{ $value->user->name }}</div>
                <small class="text-gray-400">{{ $value->created_at->diffForHumans() }}</small>
            </div>
        </div>
        <div class="col-auto font-inter text-xs gray-800 text-justify leading-6">
            {{ $value->value }}
        </div>
        <div class="col-auto mt-6">
            <div class="flex align-items-center w-full justify-between">
                <div class="flex w-1/2">
                    <div class="text-xs text-gray-500 font-inter">
                        {{ $value->directory }}
                    </div>
                </div>
                <div class="flex">
                    <div class="flex w-full">
                        <div class="w-5 h-5 text-gray-800 my-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                            </svg>
                        </div>
                        <div
                            class="buttonComment cursor-pointer hover:text-gray-800 text-xs my-auto text-gray-500 font-inter mx-2">
                            {{ $value->data->comment->count() }} Comment
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="comment mt-4 hidden w-full">
            @foreach ($value->data->comment as $item)
                <div class="flex gap-3 mb-2">
                    <div class="my-auto">
                        <div class="w-8 h-8 bg-red-700 rounded-full bg-cover bg-top"
                            style="background-image: url({{ asset('storage/' . $item->user->image) }})">
                        </div>
                    </div>
                    <div class="my-auto">
                        <div class="bg-slate-100 rounded-xl p-2">
                            {{ $item->value }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endforeach

<script>
    let buttonComment = document.querySelectorAll(".buttonComment");
    let commmet = document.querySelectorAll(".comment");
    let selection = document.querySelectorAll(".selection");
    let tSelection = document.querySelectorAll(".tSelection");

    for (let i = 0; i < buttonComment.length; i++) {
        buttonComment[i].addEventListener('click', function() {
            commmet[i].classList.toggle("hidden");
        })
    }


    for (let i = 0; i < selection.length; i++) {
        selection[i].addEventListener('click', function(e) {
            tSelection[i].classList.toggle("hidden");
        })

    }
</script>
