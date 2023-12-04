<x-app-layout>
    <x-slot name="header">
        <span class="mr-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buy') }}
        </span>
        <span class="font-semibold text-sm text-green-600 leading-tight">
            {{ __('좋은 물건 어디고?') }}
        </span>
    </x-slot>

    <div class="min-h-full mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative mb-16 lg:mb-2">
                <img class=" w-16 ml-3" src="/storage/shop.png">
                <p class="absolute top-8 left-20 text-xl font-bold text-red-500">전체상품</p>
            </div>
            <div class="bg-white overflow-visible shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-28 lg:gap-y-16">
                    @foreach ($posts as $post)
                        @if($post->on_sale == true)
                            <x-card-product :posts="$post"/>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
