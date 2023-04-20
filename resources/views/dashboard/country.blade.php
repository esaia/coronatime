@props(['countries', 'sortOrder' => 'name', 'sortBy' => 'asc'])

<x-dashboard.layout>

    <form method="GET" action=""
        class="my-5  border border-gray-100 w-full max-w-xs flex justify-start items-center rounded-md">
        <img src="/images/search.svg" alt="" class="pl-4">

        <input type="text" name="search" class="w-full h-full p-3 outline-none rounded-md "
            placeholder="{{ __('dashboard.search_placeholder') }}" value="{{ request('search') }}">
    </form>



    <div
        class="grid grid-cols-1 w-full    rounded-md shadow-md  border border-gray-50 overflow-auto  overflow-y-hidden ">

        <div class="w-full flex  bg-gray-50 rounded-t-md  min-w-[800px]   ">
            <div scope="row" class="thead">
                <a
                    href="/country?sortBy=name&sortOrder={{ request('sortOrder') == 'asc' ? 'desc' : 'asc' }}&{{ http_build_query(request()->except('sortBy', 'sortOrder')) }}">
                    {{ __('dashboard.location') }}

                </a>
                @if (request('sortBy') == 'name')
                    @if (request('sortOrder') == 'desc')
                        <img src="images/sort_desc.svg" alt="" class="w-6 h-6">
                    @else
                        <img src="images/sort_desc.svg" alt="" class="w-6 h-6 rotate-180">
                    @endif
                @else
                    <img src="images/sort_none.svg" alt="" class="w-6 h-6">
                @endif
            </div>
            <div class="thead ">
                <a
                    href="/country?sortBy=confirmed&sortOrder={{ request('sortOrder') == 'asc' ? 'desc' : 'asc' }}&{{ http_build_query(request()->except('sortBy', 'sortOrder')) }}">
                    {{ __('dashboard.new_cases') }}
                </a>
                @if (request('sortBy') == 'confirmed')
                    @if (request('sortOrder') == 'desc')
                        <img src="images/sort_desc.svg" alt="" class="w-6 h-6">
                    @else
                        <img src="images/sort_desc.svg" alt="" class="w-6 h-6 rotate-180">
                    @endif
                @else
                    <img src="images/sort_none.svg" alt="" class="w-6 h-6">
                @endif
            </div>
            <div class="thead ">
                <a
                    href="/country?sortBy=deaths&sortOrder={{ request('sortOrder') == 'asc' ? 'desc' : 'asc' }}&{{ http_build_query(request()->except('sortBy', 'sortOrder')) }}">
                    {{ __('dashboard.death') }}
                </a>
                @if (request('sortBy') == 'deaths')
                    @if (request('sortOrder') == 'desc')
                        <img src="images/sort_desc.svg" alt="" class="w-6 h-6">
                    @else
                        <img src="images/sort_desc.svg" alt="" class="w-6 h-6 rotate-180">
                    @endif
                @else
                    <img src="images/sort_none.svg" alt="" class="w-6 h-6">
                @endif
            </div>
            <div class="thead ">
                <a
                    href="/country?sortBy=recovered&sortOrder={{ request('sortOrder') == 'asc' ? 'desc' : 'asc' }}&{{ http_build_query(request()->except('sortBy', 'sortOrder')) }}">
                    {{ __('dashboard.recovered') }}

                </a>

                @if (request('sortBy') == 'recovered')
                    @if (request('sortOrder') == 'desc')
                        <img src="images/sort_desc.svg" alt="" class="w-6 h-6">
                    @else
                        <img src="images/sort_desc.svg" alt="" class="w-6 h-6 rotate-180">
                    @endif
                @else
                    <img src="images/sort_none.svg" alt="" class="w-6 h-6">
                @endif
            </div>
        </div>

        <div class=" max-h-[500px] min-w-[800px] overflow-y-auto  ">

            @foreach ($countries as $country)
                <div class="w-full flex border-b ">

                    <div class="px-6 py-4 flex-1   ">
                        {{ $country['name'] }}
                    </div>
                    <div class="px-6 py-4 flex-1    ">
                        {{ $country['confirmed'] }}
                    </div>
                    <div class="px-6 py-4 flex-1 ">
                        {{ $country['deaths'] }}
                    </div>
                    <div class="px-6 py-4 flex-1   ">
                        {{ $country['recovered'] }}

                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-dashboard.layout>
