@section('title', 'Create a new account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md py-4">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Create a new account
        </h2>
    </div>

    <x-card title="Create a new account" cardClasses="container max-w-screen-sm m-auto">

        <x-slot name="action">
            <x-button primary flat label="sign in to your account" :href="route('login')"/>
        </x-slot>

        <form wire:submit.prevent="register" class="grid gap-2">
            <x-input label="Name" wire:model.lazy="name"/>
            <x-input label="Email address" wire:model.lazy="email"/>
            <x-inputs.password label="Password" wire:model.lazy="password"/>
            <x-inputs.password label="Confirm Password" wire:model.lazy="passwordConfirmation"/>
        </form>
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <span>
                        @if(env('APP_DEBUG'))
                        <x-button xl label="Mock" wire:click="$set('email', 'admin@admin.com')"/>
                        <x-button xl label="Mock" wire:click="$set('password','password')"/>
                        @endif
                    </span>
                    <x-button primary xl label="Register" type="submit" wire:click="register"/>
                </div>
            </x-slot>
    </x-card>

</div>
