@props(['countries', 'sortOrder' => 'name', 'sortBy' => 'asc'])

<x-dashboard.layout>

    <form method="GET" action=""
        class="my-8  border border-transparent md:border-gray-100 w-full md:max-w-xs flex justify-start items-center rounded-md mx-5">
        <div class="pl-4">
            <x-icons.search />
        </div>

        <input type="text" name="search" class="w-full h-full p-3 outline-none rounded-md  "
            placeholder="{{ __('dashboard.search_placeholder') }}" value="{{ request('search') }}">
    </form>


    <div class="md:mx-5">
        <div
            class="grid grid-cols-1 w-full  rounded-md shadow-md  border border-gray-50  overflow-x-hidden overflow-y-hidden ">

            <div class="w-full flex  bg-gray-50 rounded-t-md     ">
                <div scope="row" class="thead  min-w-[20px]">
                    <a
                        href="{{ route(
                            'dashboard.country',
                            array_merge(
                                [
                                    'sortBy' => 'name',
                                    'sortOrder' => request('sortOrder') == 'asc' ? 'desc' : 'asc',
                                ],
                                request()->except('sortBy', 'sortOrder'),
                            ),
                        ) }}">
                        {{ __('dashboard.location') }}

                    </a>
                    <div class="w-20">
                        @if (request('sortBy') == 'name')
                            @if (request('sortOrder') == 'desc')
                                <x-icons.sort-desc />
                            @else
                                <x-icons.sort-asc />
                            @endif
                        @else
                            <x-icons.sort-none />
                        @endif
                    </div>

                </div>
                <div class="thead ">
                    <a
                        href="{{ route(
                            'dashboard.country',
                            array_merge(
                                [
                                    'sortBy' => 'confirmed',
                                    'sortOrder' => request('sortOrder') == 'asc' ? 'desc' : 'asc',
                                ],
                                request()->except('sortBy', 'sortOrder'),
                            ),
                        ) }}">
                        {{ __('dashboard.new_cases') }}
                    </a>
                    <div class="w-20">


                        @if (request('sortBy') == 'confirmed')
                            @if (request('sortOrder') == 'desc')
                                <x-icons.sort-desc />
                            @else
                                <x-icons.sort-asc />
                            @endif
                        @else
                            <x-icons.sort-none />
                        @endif
                    </div>

                </div>
                <div class="thead ">
                    <a
                        href="{{ route(
                            'dashboard.country',
                            array_merge(
                                [
                                    'sortBy' => 'deaths',
                                    'sortOrder' => request('sortOrder') == 'asc' ? 'desc' : 'asc',
                                ],
                                request()->except('sortBy', 'sortOrder'),
                            ),
                        ) }}">
                        {{ __('dashboard.death') }}
                    </a>
                    <div class="w-20">

                        @if (request('sortBy') == 'deaths')
                            @if (request('sortOrder') == 'desc')
                                <x-icons.sort-desc />
                            @else
                                <x-icons.sort-asc />
                            @endif
                        @else
                            <x-icons.sort-none />
                        @endif
                    </div>

                </div>
                <div class="thead ">
                    <a
                        href="{{ route(
                            'dashboard.country',
                            array_merge(
                                [
                                    'sortBy' => 'recovered',
                                    'sortOrder' => request('sortOrder') == 'asc' ? 'desc' : 'asc',
                                ],
                                request()->except('sortBy', 'sortOrder'),
                            ),
                        ) }}">
                        {{ __('dashboard.recovered') }}

                    </a>

                    <div class="w-20">

                        @if (request('sortBy') == 'recovered')
                            @if (request('sortOrder') == 'desc')
                                <x-icons.sort-desc />
                            @else
                                <x-icons.sort-asc />
                            @endif
                        @else
                            <x-icons.sort-none />

                        @endif
                    </div>

                </div>
            </div>

            <div class=" max-h-[500px]  overflow-x-hidden  overflow-y-auto  ">

                @foreach ($countries as $country)
                    <div class="w-full flex border-b ">

                        <div class="p-4 flex-1 flex min-w-[20px]  ">
                            {{ $country['name'] }}
                        </div>
                        <div class="p-4 flex-1 flex   ">
                            {{ $country['confirmed'] }}
                        </div>
                        <div class="p-4 flex-1 flex">
                            {{ $country['deaths'] }}
                        </div>
                        <div class="p-4 flex-1 flex  ">
                            {{ $country['recovered'] }}

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



</x-dashboard.layout>
