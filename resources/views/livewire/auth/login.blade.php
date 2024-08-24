@section('title', 'Sign in to your account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md py-4">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Sign in to your account
        </h2>
    </div>
    <x-card title="Sign in to your account" cardClasses="container max-w-screen-sm m-auto">

        @if (Route::has('register'))
        <x-slot name="action">
            <x-button primary flat label="create a new account" :href="route('register')"/>
        </x-slot>
        @endif
        <form wire:submit.prevent="authenticate" class="grid gap-2">
            <x-input label="username" wire:model.lazy="name"/>
            <x-inputs.password label="Password" wire:model.lazy="password"/>
            {{-- <div class="flex justify-between items-center py-2">
                <x-checkbox label="Remember" wire:model.lazy="remember"/>
                @if(Route::has('password.request'))
                <x-button flat label="Forgot your password?" :href="route('password.request')"/>
                @endif
            </div> --}}
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <span>
                        @if(env('APP_DEBUG'))
                        <x-button xl label="Mock" wire:click="authUser"/>
                        @endif
                    </span>
                    <x-button primary xl label="Sign in" type="submit" wire:click="authenticate"/>
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
