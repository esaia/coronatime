@props(['token'])



<x-layout>

    <x-auth.reset-layout>
        <x-form.layout action="{{ route('password.update') }}" method="POST">

            <h1 class="font-bold text-center text-2xl pb-8">Reset Password</h1>
            <input type="text" name="token" value="{{ $token }}" hidden>
            <input type="email" name="email" value="{{ request('email') }}" hidden>

            <x-form.input name="password" label="New password" placeholder="Enter new password" type="password" />
            <x-form.input name="password_confirmation" label="Repeat password" placeholder="Repeat password"
                type="password" />

            <x-form.button title="SAVE CHANGES" />
            </x-form>
    </x-auth.reset-layout>

</x-layout>
