<x-layout>

    <x-dashboard.header />


    <div class="max-w-[1500px] mx-auto">

        {{-- header --}}


        <div class="w-full py-6  md:px-10 ">
            <h1 class="font-bold text-2xl py-3 px-6">{{ __('dashboard.title') }}</h1>

            <div class="flex justify-start items-center gap-12 mt-5 border-b-2 border-gray-50 px-6">
                <a href="/worldwide">
                    <p
                        class="pb-2 cursor-pointer border-b-2  hover:border-b-2 hover:border-black {{ request()->route()->getName() == 'dashboard.worldwide'? 'font-bold border-b-2 border-black': 'border-transparent' }}">

                        {{ __('dashboard.world_wide') }}
                    </p>
                </a>

                <a href="/country">
                    <p
                        class="pb-2 cursor-pointer border-b-2  hover:border-b-2 hover:border-black {{ request()->route()->getName() == 'dashboard.country'? 'font-bold border-b-2 border-black': 'border-transparent' }} ">

                        {{ __('dashboard.country') }}

                    </p>
                </a>

            </div>


            {{-- slot --}}

            {{ $slot }}

        </div>

    </div>



</x-layout>
