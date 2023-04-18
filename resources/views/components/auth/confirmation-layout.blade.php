@props(['title'])


<div class="flex flex-col justify-between md:justify-center h-full items-center w-full max-w-sm px-3">

    <div lcass=" md:hidden">
    </div>

    <div class="flex flex-col justify-center items-center">
        <img src="/images/correct.gif" class="py-5 w-10 " alt="">
        <p class="text-center">{{ $title }}</p>
    </div>

    <a href="{{ route('login') }}" class="w-full">
        <x-form.button title="{{ __('login.button') }}" class="mt-20" />
    </a>
</div>
