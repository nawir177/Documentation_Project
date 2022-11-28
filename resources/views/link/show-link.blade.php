<?php
use Carbon\Carbon;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('data') }}
        </h2>
    </x-slot>
    <div class="container md:py-12 py-6">
        <div class=" md:px-16 px-3 py-7 bg-white max-w-6xl mx-auto rounded-lg">
            <h1 class="mb-10 text-3xl text-center font-Secular font-bold text-cyan-500">{{ $data->name }}</h1>
            <ul class="list-none text-gray-800 font-nuninto font-medium  ">
                <li class="mb-3">
                    <div class="flex gap-3">
                        <div class="md:w-64 w-24">
                            <div class="flex w-full gap-2 justify-between">
                                <div class="">
                                    Uploder
                                </div>
                                <div class="">
                                    :
                                </div>
                            </div>
                        </div>
                        <div class="">
                            {{ $data->user->name }}
                        </div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="flex gap-3">
                        <div class="md:w-64 w-24">
                            <div class="flex w-full gap-2 justify-between">
                                <div class="">
                                    Link
                                </div>
                                <div class="">
                                    :
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <a target="_blank" href="{{ $data->link }}"
                                class="text-cyan-500 inline-block hover:text-cyan-600">{{ $data->link }}
                            </a>
                        </div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="flex gap-3">
                        <div class="md:w-64 w-24">
                            <div class="flex w-full gap-2 justify-between">
                                <div class="">
                                    Date
                                </div>
                                <div class="">
                                    :
                                </div>
                            </div>
                        </div>
                        <div class="">
                            {{ $data->date }}
                        </div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="flex gap-3">
                        <div class="md:w-64 w-24">
                            <div class="flex w-full gap-2 justify-between">
                                <div class="">
                                    Descripition
                                </div>
                                <div class="">
                                    :
                                </div>
                            </div>
                        </div>
                        <div class="w-3/4">
                            {{ $data->description }}
                        </div>
                    </div>
                </li>
            </ul>
            {{-- List Komentar --}}
            <div class="mt-5 bg-gray-50 p-5 relative">
                <ul class="list-none">
                    @foreach ($data->comment as $comment)
                        <li class="mb-6 relative">
                            <div class="flex">

                                <div class="my-auto">
                                    <div class="inline-block bg-cover bg-center w-9 h-9 bg-slate-400 rounded-full"
                                        style="background-image: url({{ asset('storage/' . $comment->user->image) }})">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex my-auto ml-3">
                                        <div class="text-sm text-gray-500 my-auto">
                                            {{ $comment->user->name }}
                                        </div>
                                        <div class="text-xs ml-2 text-gray-400 my-auto">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        {{ $comment->value }}
                                    </div>
                                    <div class="px-3 w-full">
                                        <hr class="h-0.5 bg-gray-200 mt-3 rounded-full w-full">
                                    </div>
                                </div>
                                <div class="selection cursor-pointer hover:bg-gray-100 rounded-full w-10 h-10 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>

                                </div>
                                {{-- panel click --}}
                                <div
                                    class="tSelection hidden absolute left-48 p-3 md:left-[1000px] bg-white shadow-lg mb-3">
                                    <div class="flex gap-3">
                                        <div class="">
                                            <form action="/comment/{{ $comment->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{ $comment->user_id }}" name="user_id">
                                                <button type="submit"
                                                    class="bg-red-500 p-1 flex justify-center rounded-lg hover:bg-red-800 show_confirm"
                                                    ata-toggle="tooltip" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-5 h-5 text-white">
                                                        <path fill-rule="evenodd"
                                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>


                                        <button class="btnEdit bg-amber-400 p-1 group rounded-lg hover:bg-amber-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5 text-white">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                            </svg>

                                        </button>


                                    </div>
                                </div>
                                {{-- panel click --}}
                            </div>
                        </li>
                        {{-- edit comment --}}
                        <div class="inputEdit hidden top-[105px] z-10 absolute group w-full shadow-lg rounded-xl">
                            <form action="/comment/{{ $comment->id }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" value="{{ $comment->user_id }}" name="user_id">
                                <label class="relative mb-5">
                                    <span class="sr-only">commnet</span>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                                        <div class="bg-cover bg-center inline-block w-9 h-9 bg-slate-400 rounded-full"
                                            style="background-image: url({{ asset('storage/' . Auth()->user()->image) }})">
                                        </div>
                                    </div>
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path
                                                d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                        </svg>

                                    </span>
                                    <input
                                        class="placeholder:italic placeholder:text-slate-400 h-12 border rounded-xl bg-white w-full pl-14 pr-3 border-gray-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                        placeholder="   Add a Comment..." autocomplete="off" type="text"
                                        value="{{ $comment->value }}" name="value" autofocus id="comment"
                                        autofocus />
                                </label>
                            </form>
                        </div>
                        {{-- end edit comment --}}
                    @endforeach
                </ul>
                <div class="col-auto mb-5">
                    <div class="mx-auto relative">
                        <form action="/comment" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $data->id }}" name="data_id">
                            <label class="relative mb-5">
                                <span class="sr-only">commnet</span>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                                    <div class="bg-cover bg-center inline-block w-9 h-9 bg-slate-400 rounded-full"
                                        style="background-image: url({{ asset('storage/' . Auth()->user()->image) }})">
                                    </div>
                                </div>
                                <button class="absolute inset-y-0 right-0 flex items-center pr-4" type="submit">
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path
                                                d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                        </svg>
    
                                    </span>
                                </button>
                                <input
                                    class="placeholder:italic placeholder:text-slate-400 h-12 block border bg-white w-full rounded-xl pl-14 pr-3 border-gray-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                    placeholder="  Add a Comment..." autocomplete="off" type="text"
                                    name="value" id="comment" />
                            </label>
                        </form>
                    </div>

                </div>
            </div>
            {{-- end List komentar --}}
        </div>
    </div>
    </div>
</x-app-layout>

<script>
    let body = document.querySelectorAll(".container");
    let selection = document.querySelectorAll(".selection");
    let inputEdit = document.querySelectorAll(".inputEdit");
    let btnEdit = document.querySelectorAll(".btnEdit");
    let tSelection = document.querySelectorAll(".tSelection");
    for (let i = 0; i < selection.length; i++) {
        selection[i].addEventListener('click', function(e) {
            tSelection[i].classList.toggle("hidden");
        })

    }

    for (let y = 0; y < btnEdit.length; y++) {
        btnEdit[y].addEventListener('click', function() {
            inputEdit[y].classList.toggle("hidden");

        })

    }
</script>
