<x-dashboard.layout>


    <div class="my-5  border border-gray-100 w-full max-w-xs flex justify-start items-center rounded-md">
        <img src="/images/search.svg" alt="" class="pl-4">
        <input type="text" class="w-full h-full p-3 outline-none rounded-md" placeholder="Search by country">
    </div>

    <div class="relative overflow-x-auto shadow-md rounded-md">
        <table class="w-full text-sm text-left text-gray-500 ">

            <thead class="text-xs text-black  bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Location
                    </th>
                    <th scope="col" class="px-6 py-3">
                        New cases
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deaths
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Recovered
                    </th>
                </tr>
            </thead>


            <tbody>
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                </tr>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        Microsoft Surface Pro
                    </th>
                    <td class="px-6 py-4">
                        White
                    </td>
                    <td class="px-6 py-4">
                        Laptop PC
                    </td>
                    <td class="px-6 py-4">
                        $1999
                    </td>
                </tr>
                <tr class="bg-white ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        Magic Mouse 2
                    </th>
                    <td class="px-6 py-4">
                        Black
                    </td>
                    <td class="px-6 py-4">
                        Accessories
                    </td>
                    <td class="px-6 py-4">
                        $99
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



</x-dashboard.layout>
