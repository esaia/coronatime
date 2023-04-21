<div class="flex w-full justify-between  min-h-screen ">


    {{-- Form --}}


    <div class="flex-2  m-3 p-3 md:px-16 md:py-8">
        <div class="w-full md:max-w-xl">

            {{ $slot }}
        </div>
    </div>

    {{-- Image --}}
    <div class=" md:block  hidden  flex-1 ">
        <img src="/images/background.png" class="w-full min-h-screen h-full object-cover" alt="">
    </div>


</div>
