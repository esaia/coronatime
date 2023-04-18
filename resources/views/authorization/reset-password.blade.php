<x-layout>

    <x-auth.reset-layout>

        <x-form.layout action="{{ route('password.email') }}" method="POST"
            class="flex flex-col md:justify-center justify-between   h-full ">
            <div class="w-full ">
                <h1 class="font-bold text-center text-2xl pb-6">{{ __('confirmation.reset_title') }}</h1>
                <x-form.input name="email" label="{{ __('confirmation.email_label') }}"
                    placeholder="{{ __('confirmation.email_placeholder') }}" />
            </div>
            <x-form.button title="{{ __('confirmation.reset_button') }}" />
        </x-form.layout>


    </x-auth.reset-layout>

</x-layout>
