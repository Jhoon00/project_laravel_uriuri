<x-app-layout>
    <x-slot name="header">
        <span class="pl-5 mr-2 font-semibold text-xl text-gray-800 leading-tight">
            👋{{ $post->user->name }}
        </span>
        <span class="font-semibold text-sm text-green-600 leading-tight">
            {{ __('마음에 드십니까?') }}
        </span>
    </x-slot>

    <div class="min-h-full mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-visible relative shadow-md sm:rounded-lg">
                @if($post->on_sale == false)
                    <div class="relative">
                        <img src="/storage/soldOut.png" class="absolute z-20 w-64">
                    </div>
                @endif
                @if(auth()->check() && $post->user_id == auth()->user()->id)
                    <div class="mt-2">
                        <form action="/post/{{$post->id}}/edit" method="GET" class="absolute right-14 top-4">
                            <button type="submit" class="text-red-500 ml-2 text-6xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endif
                @if(auth()->check() && $post->user_id == auth()->user()->id)
                    <div class="mt-2">
                        <form action="/post/{{$post->id}}" method="POST" class="absolute right-4 top-4">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2 text-6xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endif
                <div class="p-6 text-gray-900 ">
                        <div class="relative mx-4 mt-4 overflow-hidden border-b-2 border-orange`-500">
                        <img
                            class="m-auto pb-10 max-w-96 max-h-96"
                            src="{{ asset('storage/' .$post->image) }}"
                            alt="ui/ux"
                        />
                        <div class="absolute inset-0 h-full w-full"></div>
                        </div>
                        <div class="p-6">
                        <div class="mb-3 flex items-center justify-between">
                            <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            {{$post->title}}
                            </h5>
                            <p class="flex items-center gap-1.5 font-sans text-2xl font-extrabold leading-relaxed text-blue-gray-900 antialiased">
                            💲{{number_format($post->price)}}원
                            </p>
                        </div>
                        <p class="block font-sans text-base font-semibold leading-relaxed text-gray-700 antialiased">
                            {{$post-> content}}
                        </p>
                        </div>
                        <div class="p-6 pt-3">
                            @if(auth()->check() && $post->user_id == auth()->user()->id && $post->on_sale == true)
                                <form action="/post/{{$post->id}}/trade" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                        <button
                                        class="block w-full select-none rounded-lg bg-orange-600 mb-2 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="submit"
                                        data-ripple-light="true"
                                        >
                                        판매완료
                                        </button>
                                </form>
                            @endif
                            <button
                                class="block w-full select-none rounded-lg bg-green-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button"
                                data-ripple-light="true"
                                onclick="toggleComments()"
                            >
                                comments
                            </button>

                            <div id="comments" class="mt-4">
                                <form action="/post/{{$post->id}}/comments" method="POST" class="relative mb-16">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="content" class="block text-sm font-medium text-gray-700">댓글 작성</label>
                                        <textarea name="content" id="content" rows="3" class="mt-1 p-2 border border-orange-400 rounded-md w-full @error('content')  @enderror"></textarea>
                                        @error('content')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="absolute px-4 py-2 bg-orange-500 text-white rounded end-0">댓글 작성</button>
                                </form>

                                <!-- Comments -->
                                @foreach ($post->comments as $comment)
                                    <div class="border-t mt-4 pt-4 relative">
                                        <p class="text-gray-700">{{ $comment->content }}</p>
                                        <small class="text-gray-500">작성자: {{ $comment->user->name }}</small>
                                        @if(auth()->check() && $comment->user_id == auth()->user()->id)
                                            <div class="mt-2">
                                                <form action="/post/{{$post->id}}/comments/{{$comment->id}}" method="POST" class="absolute right-0 top-10">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="text-red-500 ml-2">삭제</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    <!-- stylesheet -->
                    <link
                        rel="stylesheet"
                        href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
                    />

                    <!-- from cdn -->
                    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
                    <script>
                        const NUMBER_FORMAT_REGX = /\B(?=(\d{3})+(?!\d))/g;

                        function toggleComments() {
                            const commentsDiv = document.getElementById('comments');
                            commentsDiv.classList.toggle('hidden');
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
