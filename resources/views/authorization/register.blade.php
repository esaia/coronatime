<x-layout>


    <x-auth.layout class="p-2  ">

        <x-auth.header title="Welcome to Coronatime" desc="Please enter required info to sign up" />

        <x-form.layout action="{{ route('register.store') }}" method="POST">
            <x-form.input name="username" label="Username" placeholder="Enter unique username" />
            <p class="text-gray-400 text-sm font-light pt-1">Username should be unique, min 3 symbols </p>

            <x-form.input name="email" label="Email" placeholder="Enter your email" type="email" />


            <x-form.input name="password" label="Password" placeholder="Fill in password" type="password" />
            <x-form.input name="password_confirmation" label="Repeat password" placeholder="Repeat password"
                type="password" />




            <div class="flex items-center justify-between py-5">

                <div class="flex gap-2 items-center justify-center">
                    <input id="default-checkbox" type="checkbox" class="border-5 border-solid border-red-600 ">

                    <p>Remember this device</p>
                </div>

            </div>



            <x-form.button title="SIGN UP" />

            <p class="font-light text-center p-4 ">Already have an account?
                <a href="{{ route('login') }}">
                    <span class="font-semibold"> Log in </span>
                </a>
            </p>
        </x-form.layout>
    </x-auth.layout>


</x-layout>
