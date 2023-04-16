<x-layout>


    <x-auth.layout>

        <x-auth.header title="Welcome back" desc="Welcome back! Please enter your details" />




        <x-form.layout action="{{ route('login.store') }}" method="POST">
            <x-form.input name="email" label="Username" placeholder="Enter unique username or email" />
            <x-form.input name="password" label="Password" placeholder="Fill in password" type="password" />



            <div class="flex items-center justify-between py-5">

                <div class="flex gap-2 items-center justify-center">


                    <input name="remember" id="default-checkbox" type="checkbox"
                        class="border-5 border-solid border-red-600 ">

                    <p>Remember this device</p>
                </div>

                <p class="text-[#2029F3] cursor-pointer">Forgot password?</p>
            </div>



            <x-form.button title="Log In" />

            <p class="font-light text-center p-4 ">Don’t have and account?
                <a href="/register">
                    <span class="font-semibold">
                        Sign up for free
                    </span>
                </a>
            </p>
        </x-form.layout>
    </x-auth.layout>


</x-layout>
