@props(['token'])



<x-layout>

    <x-auth.reset-layout>
        <x-form.layout action="{{ route('password.update') }}" method="POST"
            class="flex flex-col md:justify-center justify-between   h-full  ">
            <div>
                <h1 class="font-bold text-center text-2xl pb-8">{{ __('confirmation.reset_password') }}</h1>
                <input type="text" name="token" value="{{ $token }}" hidden>
                <input type="email" name="email" value="{{ request('email') }}" hidden>

                <x-form.input name="password" label="{{ __('confirmation.new_password_label') }}"
                    placeholder="{{ __('confirmation.new_password_placeholder') }}" type="password" />
                <x-form.input name="password_confirmation" label="{{ __('confirmation.repeate_password_label') }}"
                    placeholder="{{ __('confirmation.repeat_password_placeholder') }}" type="password" />
            </div>
            <x-form.button title="{{ __('confirmation.save_changes') }}" />

        </x-form.layout>

    </x-auth.reset-layout>

</x-layout>
