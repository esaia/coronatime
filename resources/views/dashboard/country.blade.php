@props(['countries', 'sortOrder' => 'name', 'sortBy' => 'asc'])

<x-dashboard.layout>

    <form method="GET" action=""
        class="my-5  border border-gray-100 w-full max-w-xs flex justify-start items-center rounded-md">
        <img src="/images/search.svg" alt="" class="pl-4">

        <input type="text" name="search" class="w-full h-full p-3 outline-none rounded-md "
            placeholder="{{ __('dashboard.search_placeholder') }}" value="{{ request('search') }}">
    </form>

    <div class="relative overflow-x-auto shadow-md rounded-md  max-h-[500px] ">
        <table class="w-full text-sm text-left text-gray-800   ">

            <thead class="text-xs text-black  bg-gray-50  w-full sticky top-0  ">
                <tr class="w-full ">
                    <th scope="col" class="px-6 py-3 cursor-pointer ">
                        <div class="flex items-center">
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
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer ">
                        <div class="flex items-center">
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

                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer ">
                        <div class="flex items-center">

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
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer ">
                        <div class="flex items-center">
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

                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($countries as $country)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-medium ">
                            {{ $country['name'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $country['confirmed'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $country['deaths'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $country['recovered'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>


</x-dashboard.layout>
