<div x-data="{ show: false }" x-on:click.away="show = false" class="flex gap-2 cursor-pointer relative">

    <div class="flex gap-2" x-on:click="show = ! show ">
        <h2>English</h2>
        <img src="images/arrow.svg" alt="">
    </div>

    <div x-show="show"
        class="absolute w-24  mt-7 bg-white px-3  border border-gray-200 left-[40%] translate-x-[-50%] hover:bg-gray-50 rounded-sm">
        <h2 class="text-center">Georgia</h2>

    </div>
</div>
