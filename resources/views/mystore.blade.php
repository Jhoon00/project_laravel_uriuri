<x-app-layout>
    <x-slot name="header">
        <span class="mr-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mystore') }}
        </span>
        <span class="font-semibold text-sm text-green-600 leading-tight">
            {{ __('나의 작은 상점') }}
        </span>
    </x-slot>

    @php
        $hasPostChecking = false;
    @endphp
    <div class="min-h-full mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-visible shadow-md sm:rounded-lg">
                <div class="relative mb-16 lg:mb-0">
                    <img class=" w-16 ml-3" src="/storage/shop.png">
                    <p class="absolute top-8 left-20 text-xl font-bold text-red-500">판매중</p>
                </div>
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-x-4 gap-y-28 lg:gap-y-16">
                        @foreach ($posts as $post)
                            @if(auth()->check() && $post->user_id == auth()->user()->id && $post->on_sale == true)
                                <x-card-product :posts="$post"/>
                                @php
                                $hasPostChecking = true;
                            @endphp
                        @endif
                    @endforeach
                    @if (!$hasPostChecking)
                        <img src="/storage/busyToki.jpg" class="w-full">
                    @endif
                    </div>
                </div>
            </div>
            @php
                $hasPostChecking = false;
            @endphp
            <div class="bg-white overflow-visible shadow-md sm:rounded-lg mt-7">
                <div class="relative mb-16 lg:mb-0">
                    <img class=" w-16 ml-3" src="/storage/soldOut2.png">
                    <p class="absolute top-8 left-20 text-xl font-bold text-red-500">판매완료</p>
                </div>
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-x-4 gap-y-28 lg:gap-y-16">
                        @foreach ($posts as $post)
                            @if(auth()->check() && $post->user_id == auth()->user()->id && $post->on_sale == false)
                                <x-card-product :posts="$post"/>

                                @php
                                    $hasPostChecking = true;
                                @endphp
                            @endif
                        @endforeach
                        @if (!$hasPostChecking)
                            <img src="/storage/busyToki.jpg" class="w-full">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
