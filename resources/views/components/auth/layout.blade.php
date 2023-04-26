<div class="flex w-full justify-between  min-h-screen ">


    {{-- Form --}}


    <div class="flex-2 p-3  flex px-5 md:px-20  justify-center items-start  xl:block  xl:pl-48 py-8">
        <div class="w-full max-w-xl">

            {{ $slot }}
        </div>
    </div>

    {{-- Image --}}
    <div class=" md:block  hidden  flex-1 ">
        <img src="/images/background.png" class="w-full min-h-screen h-full object-cover" alt="">
    </div>


</div>
