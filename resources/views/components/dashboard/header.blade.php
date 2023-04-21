<div class="w-full border-b border-gray-100 ">
    <div class="w-full py-3  px-6 md:px-16 flex justify-between items-center max-w-[1500px] m-auto">
        <x-logo />

        <div class="flex justify-center items-center gap-5">
            <x-dashboard.language-switcher />

            <div class=" hidden  md:flex justify-center  items-center gap-5 ">
                <h2 class="border-r-[1px] border-gray-200 pr-5 py-2 font-bold ">{{ auth()->user()->username }}</h2>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"> {{ __('dashboard.logout') }} </button>
                </form>
            </div>



            <div x-data="{ show: false }" x-on:click.away="show = false" class="flex gap-2 cursor-pointer relative">

                <div class="flex gap-2 cursor-pointer md:hidden" x-on:click="show = ! show ">
                    <x-icons.burger />

                </div>

                <div x-show="show"
                    class="absolute w-32  mt-7 bg-white mx-3 py-2  border border-gray-200 right-0  rounded-sm  ">
                    <h2 class=" font-bold px-2  hover:bg-gray-50 text-center ">Takeshi K.</h2>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-2  w-full hover:bg-gray-50"> Log Out </button>
                    </form>

                </div>
            </div>



        </div>


    </div>

</div>
