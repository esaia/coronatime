<x-layout>

    <div class="absolute left-[50%] translate-x-[-50%] p-5">
        <x-logo />
    </div>
    <div class="flex flex-col justify-center items-center w-full min-h-screen h-full ">
        <img src="/images/correct.gif" class="py-5 w-10" alt="">
        <p>{{ __('confirmation.email_confirm') }}</p>
    </div>

</x-layout>
