<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>UriUri</title>
</head>
<body>
    <div class="min-h-screen bg-orange-500">
        <x-header></x-header>
        <div class="flex justify-between pt-52 h-full ml-10 mr-10">
            <div class="flex-1 flex flex-col h-full">
                <div class="flex justify-center">
                    <img src="TOKISELL.png" alt="" class="h-96">
                </div>
                <div class="text-center text-white font-mono text-3xl mt-6">
                    <button class="group relative h-12 w-48 overflow-hidden rounded-2xl bg-green-500 text-lg font-bold">
                        SELL
                    <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                </div>
            </div>
            <div class="flex-1 flex flex-col h-full">
                <div class="flex justify-center">
                    <img src="/storage/TOKIBUY.png" alt="" class="h-96">
                </div>
                <div class="text-center text-white font-mono text-3xl mt-6">
                    <button class="group relative h-12 w-48 overflow-hidden rounded-2xl bg-green-500 text-lg font-bold">
                        BUY
                        <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                </div>
            </div>
            <div class="flex-1 flex flex-col h-full">
                <div class="flex justify-center">
                    <img src="/storage/TOKI.png" alt="" class="h-96">
                </div>
                <div class="text-center text-white font-mono text-3xl mt-6">
                    <button class="group relative h-12 w-48 overflow-hidden rounded-2xl bg-green-500 text-lg font-bold">
                    MY PAGE
                    <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                </button></div>

            </div>
        </div>
    </div>
</body>
</html>
