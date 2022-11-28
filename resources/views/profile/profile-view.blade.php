<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('data') }}
        </h2>
    </x-slot>
    <div class="container py-12">
        <div class="mx-auto px-6">
        <div class="grid md:grid-cols-4 grid-cols-1 gap-8 md:px-16">
            <div class="md:col-span-3 col-auto">
                {{-- tabel my link --}}
                <div class="col-auto mb-3">
                    @include('profile.partials.mylink')
                </div>
                <div class="col-auto">
                    @include('profile.partials.lastUpload')
                </div>
            </div>
            <div class="col-auto">
                <div class="col">
                    @include('profile.partials.profile')
                </div>
            </div>
        </div>
        </div>

    </div>
</x-app-layout>
