<div class="w-full border-b border-gray-100 ">
    <div class="w-full py-3  px-6 md:px-16 flex justify-between items-center max-w-[1500px] m-auto">
        <x-logo />


        <div class="flex justify-center items-center gap-5">

            <div class="flex gap-2 cursor-pointer relative group py-2  ">
                <h2>English</h2>
                <img src="images/arrow.svg" alt="">

                <div
                    class="absolute mt-7 bg-white px-7 py-2 border border-gray-200 left-[50%] translate-x-[-50%] hover:bg-gray-50 hidden hover:block  group-hover:block">
                    <h2>Georgia</h2>
                </div>
            </div>

            <div class=" hidden  md:flex justify-center  items-center gap-5  ">
                <h2 class="border-r-[1px] border-gray-200 pr-5 py-2 font-bold">Takeshi K.</h2>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"> Log Out </button>
                </form>
            </div>

            <img src="images/burger.svg" class="cursor-pointer md:hidden" />

        </div>


    </div>

</div>
