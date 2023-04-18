@props(['title', 'desc'])


<div class="flex justify-start items-center gap-10">

    <x-logo />
    <x-dashboard.language-switcher />
</div>

<h2 class="font-bold text-2xl mt-14">{{ $title }}</h2>
<p class='text-gray-500 py-5 text-xl font-light'>{{ $desc }}</p>
