<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('data') }}
        </h2>
    </x-slot>
    <div class="container py-12">
        <div class="mx-auto px-6 lg:px-16">
            <div class="grid md:grid-cols-5 grid-cols-1 gap-8 ">
                <div class="md:col-span-3 col-auto gap-5">
                    <div class="col-auto mb-5">
                        {{-- my link --}}
                        @include('admin.partials-view.my-link')
                        {{-- end my-link --}}
                    </div>

                    {{-- All User --}}
                    <div class="col-auto mb-5">
                        @include('admin.partials-view.category')
                    </div>
                    {{-- end All User --}}
                </div>
                <div class="md:col-span-2 col-span-1">
                    <div class="col-auto mb-3">
                        @include('admin.partials-view.verification')
                    </div>
                    <div class="col-auto">
                        @include('admin.partials-view.users')
                    </div>
                    <div class="col-auto">
                        @include('admin.partials-view.icon')
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
