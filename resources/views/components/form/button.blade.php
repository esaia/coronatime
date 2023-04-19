@props(['title'])


<button
    {{ $attributes(['class' => 'w-full bg-[#0FBA68] rounded-md  text-white text-center font-bold p-3 my-6 text-sm md:text-md']) }}
    type='submit'>

    {{ $title }}
</button>
