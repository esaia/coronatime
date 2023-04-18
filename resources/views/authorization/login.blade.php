<x-layout>


    <x-auth.layout>


        <x-auth.header title="{{ __('login.title') }}" desc="{{ __('login.desc') }}" />




        <x-form.layout action="{{ route('login.store') }}" method="POST">
            <x-form.input name="email" label="{{ __('login.username_label') }}"
                placeholder="{{ __('login.username_placeholder') }}" />
            <x-form.input name="password" label="{{ __('login.password_label') }}"
                placeholder="{{ __('login.password_placeholder') }}" type="password" />



            <div class="flex items-center justify-between py-5">

                <div class="flex gap-2 items-center justify-center">

                    <input name="remember" id="default-checkbox" type="checkbox"
                        class="border-5 border-solid border-red-600 ">

                    <p>{{ __('login.remember') }}</p>
                </div>

                <a href="{{ route('password.request') }}">
                    <p class="text-[#2029F3] cursor-pointer">{{ __('login.forget') }}</p>
                </a>
            </div>



            <x-form.button title="{{ __('login.button') }}" />

            <p class="font-light text-center p-4 ">{{ __('login.not_have_account') }}
                <a href="{{ route('register') }}">
                    <span class="font-semibold">
                        {{ __('login.sign_up') }}
                    </span>
                </a>
            </p>
        </x-form.layout>
    </x-auth.layout>


</x-layout>
