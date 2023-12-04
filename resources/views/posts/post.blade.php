<x-app-layout>
    <x-slot name="header">
        <span class="mr-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sell') }}
        </span>
        <span class="font-semibold text-sm text-green-600 leading-tight">
            {{ __('자알 팔아보자') }}
        </span>
    </x-slot>

    <div class="min-h-full mt-10">
        <div class="flex justify-center">
            <img src="/storage/carrot3.png"/>
        </div>
        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div s x-data="{ images: [] }">
                <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-xl max-w-2xl bg-white">
                    <input class="title border-t-0 border-x-0 border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="상품명" type="text" name="title">
                    <input class="title border-t-0 border-x-0 border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="가격" type="number" name="price">
                    <textarea class="description bg-transparent sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="상품에 대한 간단한 홍보" name="content"></textarea>

                    <!-- icons -->
                    <div class="icons flex text-gray-500 m-2">
                        <label id="select-image">
                            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                        <input hidden type="file" name="image" multiple @change="images = Array.from($event.target.files).map(file => ({url: URL.createObjectURL(file), name: file.name, preview: ['jpg', 'jpeg', 'png', 'gif'].includes(file.name.split('.').pop().toLowerCase()), size: file.size > 1024 ? file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb' : file.size + 'b'}))" x-ref="fileInput">
                        </label>
                    </div>

                    <!-- Preview image here -->
                    <div id="preview" class="my-4 flex">
                        <template x-for="(image, index) in images" :key="index">
                            <div class="relative w-32 h-32 object-cover rounded mb-10">
                                <div x-show="image.preview" class="relative w-32 h-32 object-cover rounded">
                                    <img :src="image.url" class="w-32 h-32 object-cover rounded">
                                    <button @click="images.splice(index, 1)" class="w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:text-red-700 hover:bg-gray-100 rounded-full p-1"><span class="mx-auto">×</span></button>
                                    <div x-text="image.size" class="text-xs text-center p-2"></div>
                                </div>
                                <div x-show="!image.preview" class="relative w-32 h-32 object-cover rounded">
                                <svg class="fill-current  w-32 h-32 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                </svg>
                                <button @click="images.splice(index, 1)" class="w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:text-red-700 hover:bg-gray-100 rounded-full p-1"><span class="mx-auto">×</span></button>
                                <div x-text="image.size" class="text-xs text-center p-2"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <!-- Buttons -->
                    <div class="buttons flex justify-end">
                        <button type="submit" class=" border border-green-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-orange-400">Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
