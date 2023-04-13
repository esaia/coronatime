<x-layout>


    <x-auth.layout class="p-2  ">

        <x-auth.header title="Welcome to Coronatime" desc="Please enter required info to sign up" />

        <x-form.layout action="/register" method="POST">
            <x-form.input name="username" label="Username" placeholder="Enter unique username" />
            <p class="text-gray-400 text-sm font-light pt-1">Username should be unique, min 3 symbols </p>

            <x-form.input name="email" label="Email" placeholder="Enter your email" />


            <x-form.input name="password" label="Password" placeholder="Fill in password" />
            <x-form.input name="repeat" label="Repeat password" placeholder="Repeat password" />




            <div class="flex items-center justify-between py-5">

                <div class="flex gap-2 items-center justify-center">
                    <input id="default-checkbox" type="checkbox" class="border-5 border-solid border-red-600 ">

                    <p>Remember this device</p>
                </div>

            </div>



            <x-form.button title="SIGN UP" />

            <p class="font-light text-center p-4 ">Already have an account?
                <a href="/login">
                    <span class="font-semibold"> Log in </span>
                </a>
            </p>
        </x-form.layout>
    </x-auth.layout>


</x-layout>
