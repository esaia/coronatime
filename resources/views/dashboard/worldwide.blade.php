@props(['newCases', 'recovered', 'deaths'])


<x-dashboard.layout>


    <div class="grid grid-cols-2 md:grid-cols-3 gap-5  h-[250px]  mt-12 px-6">

        <div class="bg-violet-100 statistic-div col-span-2 md:col-span-1">
            <x-icons.statistic-1 />
            <p class="text-xl">{{ __('dashboard.new_cases') }}</p>
            <h3 class="statistic-title  text-blue-800 ">{{ number_format($newCases) }}</h3>
        </div>

        <div class="bg-emerald-50 statistic-div ">
            <x-icons.statistic-3 />
            <p class="text-xl">{{ __('dashboard.recovered') }}</p>
            <h3 class="statistic-title  text-green-600 ">{{ number_format($recovered) }}</h3>
        </div>


        <div class="bg-amber-50 statistic-div ">
            <x-icons.statistic-2 />
            <p class="text-xl">{{ __('dashboard.death') }}</p>
            <h3 class="statistic-title text-yellow-500 ">{{ number_format($deaths) }}</h3>
        </div>

    </div>


</x-dashboard.layout>
