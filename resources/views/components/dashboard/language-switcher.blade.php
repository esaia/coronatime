<form method="POST" action="{{ route('language') }}" x-data="{ show: false }" x-on:click.away="show = false"
    class="flex gap-2 cursor-pointer relative">

    @csrf
    <div class="flex gap-2" x-on:click="show = ! show ">
        <h2>{{ App::isLocale('en') ? 'English' : 'Georgia' }}</h2>
        <img src="images/arrow.svg" alt="">
    </div>

    <div x-show="show"
        class="absolute w-24  mt-7 bg-white px-3  border border-gray-200 left-[40%] translate-x-[-50%] hover:bg-gray-50 rounded-sm">
        <button type="submit" name="locale" value="{{ App::isLocale('en') ? 'ka' : 'en' }}"
            class="text-center">{{ App::isLocale('en') ? 'Georgia' : 'English' }}</button>

    </div>
</form>
