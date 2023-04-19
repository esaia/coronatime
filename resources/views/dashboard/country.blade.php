@props(['countries', 'sortOrder', 'sortBy'])

<x-dashboard.layout>

    <div class="my-5  border border-gray-100 w-full max-w-xs flex justify-start items-center rounded-md">
        <img src="/images/search.svg" alt="" class="pl-4">
        <input type="text" class="w-full h-full p-3 outline-none rounded-md "
            placeholder="{{ __('dashboard.search_placeholder') }}">
    </div>


    <div class="relative overflow-x-auto shadow-md rounded-md  h-[500px] ">
        <table class="w-full text-sm text-left text-gray-800   ">

            <thead class="text-xs text-black  bg-gray-50  w-full sticky top-0  ">
                <tr class="w-full ">
                    <th scope="col" class="px-6 py-3 cursor-pointer ">
                        <div class="flex items-center">
                            <a
                                href="{{ route('dashboard.sort', ['sort_by' => 'name', 'sort_order' => $sortOrder == 'asc' && $sortBy == 'name' ? 'desc' : 'asc']) }}">
                                {{ __('dashboard.location') }}
                            </a>
                            @if ($sortBy == 'name')
                                @if ($sortOrder == 'desc')
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
                                href="{{ route('dashboard.sort', ['sort_by' => 'confirmed', 'sort_order' => $sortOrder == 'asc' && $sortBy == 'confirmed' ? 'desc' : 'asc']) }}">
                                {{ __('dashboard.new_cases') }}
                            </a>
                            @if ($sortBy == 'confirmed')
                                @if ($sortOrder == 'desc')
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
                                href="{{ route('dashboard.sort', ['sort_by' => 'deaths', 'sort_order' => $sortOrder == 'asc' && $sortBy == 'deaths' ? 'desc' : 'asc']) }}">
                                {{ __('dashboard.death') }}
                            </a>
                            @if ($sortBy == 'deaths')
                                @if ($sortOrder == 'desc')
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
                                href="{{ route('dashboard.sort', ['sort_by' => 'recovered', 'sort_order' => $sortOrder == 'asc' && $sortBy == 'recovered' ? 'desc' : 'asc']) }}">
                                {{ __('dashboard.recovered') }}
                            </a>
                            @if ($sortBy == 'recovered')
                                @if ($sortOrder == 'desc')
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
