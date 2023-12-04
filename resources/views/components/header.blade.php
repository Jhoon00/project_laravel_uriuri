<div class=" font-mono text-center text-6xl p-4 bg-white fixed w-full">
    <div class="relative">
        @Auth
            <div class="absolute right-0 text-sm">logout</div>
        @else
            <div class="absolute right-0 text-sm">login</div>
        @endauth
    </div>
    <div>うりうり</div>

</div>
