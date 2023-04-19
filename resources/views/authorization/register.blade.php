<x-layout>


    <x-auth.layout>

        <x-auth.header title="{{ __('register.title') }}" desc="{{ __('register.desc') }}" />

        <x-form.layout action="{{ route('register.store') }}" method="POST">
            <x-form.input name="username" label="{{ __('register.username_label') }}"
                placeholder="{{ __('register.email_placeholder') }}" />
            <p class="text-gray-400 text-sm font-light pt-1">{{ __('register.username_require') }} </p>

            <x-form.input name="email" label="{{ __('register.email_label') }}"
                placeholder="{{ __('register.email_placeholder') }}" type="email" />


            <x-form.input name="password" label="{{ __('register.password_label') }}"
                placeholder="{{ __('register.password_placeholder') }}" type="password" />
            <x-form.input name="password_confirmation" label="{{ __('register.repeat_password_label') }}"
                placeholder="{{ __('register.repeat_password_placeholder') }}" type="password" />




            <div class="flex items-center justify-between py-5">

                <div class="flex gap-2 items-center justify-center">
                    <input id="default-checkbox" type="checkbox" class="border-5 border-solid border-red-600 ">

                    <p>{{ __('register.remember') }}</p>
                </div>

            </div>



            <x-form.button title="{{ __('register.button') }}" />

            <p class="font-light text-center p-4 ">{{ __('register.have_account') }}
                <a href="{{ route('login') }}">
                    <span class="font-semibold"> {{ __('register.sign_up') }} </span>
                </a>
            </p>
        </x-form.layout>


    </x-auth.layout>


</x-layout>
