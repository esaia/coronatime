@props(['countries', 'sortOrder' => 'name', 'sortBy' => 'asc'])

<x-dashboard.layout>

    <form method="GET" action=""
        class="my-8  border border-gray-100 w-full max-w-xs flex justify-start items-center rounded-md">
        <div class="pl-4">
            <x-icons.search />
        </div>

        <input type="text" name="search" class="w-full h-full p-3 outline-none rounded-md "
            placeholder="{{ __('dashboard.search_placeholder') }}" value="{{ request('search') }}">
    </form>


    <div
        class="grid grid-cols-1 w-full    rounded-md shadow-md  border border-gray-50 overflow-auto  overflow-y-hidden ">

        <div class="w-full flex  bg-gray-50 rounded-t-md  min-w-[800px]   ">
            <div scope="row" class="thead">
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
