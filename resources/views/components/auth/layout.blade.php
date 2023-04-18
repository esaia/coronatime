<div class="flex w-full justify-between  h-screen ">


    {{-- Form --}}


    <div class="flex-1 md:px-10 xl:px-32 py-10 px-3 min-xl  ">
        {{ $slot }}
    </div>

    {{-- Image --}}
    <div class="flex-1/2 md:flex-1 md:block hidden ">
        <img src="/images/img-1.png" class="w-full h-screen object-cover" alt="">
    </div>


</div>
