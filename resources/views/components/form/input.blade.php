    @props(['name', ' label', 'placeholder' => 'your text...', 'type' => 'text'])


    <div class="flex flex-col  gap-2 mt-5 w-full">
        <label class="font-bold" for="">{{ $label }}</label>

        <div
            class="flex  border-[1px]  border-gray-100  focus:border-[#2029F3] focus:ring-blue-500  rounded-md 
            {{ $errors->has($name) ? ' border-red-400' : '' }}  {{ !empty(old($name)) ? 'border-green-400' : '' }}">


            <input name="{{ $name }}" type="{{ $type }}" class="   flex-1  outline-none p-4   "
                placeholder="{{ $placeholder }}" value="{{ old($name) }}">


            @unless ($errors->has($name))
                @if (!empty(old($name)))
                    <x-icons.correct />
                @endif
            @endunless

        </div>


        @error($name)
            <p class="text-[#CC1E1E] flex gap-2 items-center">
                <x-icons.error /> {{ $message }}
            </p>
        @enderror
    </div>
