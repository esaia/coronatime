    @props(['name', ' label', 'placeholder' => 'your text...'])


    <div class="flex flex-col  gap-2 mt-5">
        <label class="font-bold" for="">{{ $label }}</label>

        <div class="flex rounded border-[1px]  border-gray-100 focus:border-[#2029F3] focus:ring-blue-500 px-5 py-3">
            <input name="{{ $name }}" type="text" class="   flex-1  outline-none"
                placeholder="{{ $placeholder }}" value="{{ old($name) }}">


            @unless ($errors->has($name))
                @if (!empty(old($name)))
                    <img src="images/correct.svg" class="w-4" alt="">
                @endif
            @endunless

        </div>


        @error($name)
            <p class="text-[#CC1E1E] flex gap-2">
                <img src="images/errorIcon.svg" alt=""> {{ $message }}
            </p>
        @enderror
    </div>
