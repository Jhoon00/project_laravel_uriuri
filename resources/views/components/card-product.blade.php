<div class="relative group h-48 flex   flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
    <a href="{{ route('post.show', $posts->id) }}" class="block">
        <div class="h-28">
            <div
                class="absolute -top-20 lg:top-[-10%] left-[5%] z-40  group-hover:top-[-40%] group-hover:opacity-[0.9]   duration-300 w-[90%] h-48 bg-orange-500 rounded-xl justify-items-center align-middle">
                <img src="{{ asset('storage/' .$posts->image) }}"
                    class="w-36 h-36  mt-6 m-auto" alt="Post image" title="Automotive" loading="lazy"
                    width="200" height="200">
            </div>
        </div>
        <div class="p-6 z-10 w-full">
            <p
                class="mb-2 inline-block text-tg text-center w-full  text-xl  font-sans  font-semibold leading-snug tracking-normal   antialiased">
                {{$posts-> title}}
            </p>
        </div>
    </a>
</div>
