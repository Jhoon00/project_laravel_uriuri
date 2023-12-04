<x-app-layout>
    <x-slot name="header">
        <span class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('うりうり') }}
        </span>
        <span class="font-semibold text-sm text-green-600 leading-tight">
            {{ __('우리들의 작은 상점') }}
        </span>
    </x-slot>

    <div class="min-h-full">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div> --}}
        <!-- component -->
        <section class="bg-orange-500 h-">
            <div class="container px-6 py-10 mx-auto">
                <div class="lg:flex lg:items-center">
                    <div class="w-full space-y-12 lg:w-1/2 ">
                        <div>

                            <div class="mt-2">
                                <span class="inline-block w-40 h-1 rounded-full bg-green-500"></span>
                                <span class="inline-block w-3 h-1 ml-1 rounded-full bg-green-500"></span>
                                <span class="inline-block w-1 h-1 ml-1 rounded-full bg-green-500"></span>
                            </div>
                        </div>

                        <div class="md:flex md:items-start md:-mx-4">
                            <span class="w-24 h-24 inline-block px-1 text-blue-500 bg-green-400 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                <img class="object-cover h-full" src="/storage/TOKIBUY.png" alt="" class="h-96">
                            </span>

                            <div class="mt-4 md:mx-4 md:mt-0">
                                <h1 class="text-2xl font-semibold text-white capitalize">うり상점의 SELL</h1>

                                <p class="mt-3 text-emerald-100">
                                    うり상점에서 주변 이웃들에게 자신의 물건을 나눔하거나 팔아보세요.
                                </p>
                            </div>
                        </div>

                        <div class="md:flex md:items-start md:-mx-4">
                            <span class="w-24 h-24 inline-block px-1 text-blue-500 bg-green-400 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                <img class="object-cover h-full" src="/storage/TOKIBUY.png" alt="" class="h-96">
                            </span>

                            <div class="mt-4 md:mx-4 md:mt-0">
                                <h1 class="text-2xl font-semibold capitalize text-white">うり상점의 BUY</h1>

                                <p class="mt-3 text-emerald-100">
                                    うり상점에서 주변 이웃들에게 원하는 물건을 나눔받거나 구매해보세요.
                                </p>
                            </div>
                        </div>

                        <div class="md:flex md:items-start md:-mx-4">
                            <span class="w-24 h-24 inline-block px-1 text-blue-500 bg-green-400 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                <img class="object-cover h-full" src="/storage/TOKIBUY.png" alt="" class="h-96">
                            </span>

                            <div class="mt-4 md:mx-4 md:mt-0">
                                <h1 class="text-2xl font-semibold capitalize text-white">うり상점의 MY STORE</h1>

                                <p class="mt-3 text-emerald-100">
                                    지금 껏 내가 올린 모든 상품들을 한 눈에 확인하고 관리가 가능합니다.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="hidden lg:flex lg:items-center lg:w-1/2 lg:justify-center">
                        <img class="bg-white w-[28rem] h-[28rem] object-cover xl:w-[34rem] xl:h-[34rem] rounded-full" src="/storage/carrotToki.webp" alt="">
                    </div>
                </div>

                <hr class="border-green-500 mt-12">

            </div>
        </section>
    </div>
</x-app-layout>
