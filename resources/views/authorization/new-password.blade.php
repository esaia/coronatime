<x-layout>

    <x-auth.reset-layout>
        <x-form.layout action="/" method="POST">

            <h1 class="font-bold text-center text-2xl pb-8">Reset Password</h1>

            <x-form.input name="password" label="New password" placeholder="Enter new password" />
            <x-form.input name="repeat" label="Repeat password" placeholder="Repeat password" />

            <x-form.button title="SAVE CHANGES" />
            </x-form>
    </x-auth.reset-layout>

</x-layout>
