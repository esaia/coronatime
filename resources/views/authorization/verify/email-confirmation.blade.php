<x-layout>

    <div class="absolute left-[50%] translate-x-[-50%] p-5">
        <x-logo />
    </div>
    <div class="flex flex-col justify-center items-center w-full min-h-screen h-full ">
        <img src="/images/correct.gif" class="py-5 w-10" alt="">
        <p>{{ __('confirmation.email_confirm') }}</p>
        <div class="flex">


            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button class=" m-5 px-5 py-2 text-white bg-green-500">
                    {{ __('dashboard.resend') }}
                </button>

            </form>


            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class=" m-5 px-5 py-2 text-white bg-green-500">
                    {{ __('dashboard.logout') }}
                </button>
            </form>


        </div>

    </div>

</x-layout>
