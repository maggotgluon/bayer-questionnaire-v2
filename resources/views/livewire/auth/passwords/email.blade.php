@section('title', 'Reset password')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md py-4">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Reset password
        </h2>
    </div>

    <x-card title="Reset password" cardClasses="container max-w-screen-sm m-auto">
        @if ($emailSentMessage)
            <div class="grid">
                <x-badge positive lg :label="$emailSentMessage" icon="check-circle" 
                    class="m-auto"/>
            </div>
        @else
        <form wire:submit.prevent="sendResetPasswordLink">
            <x-input label="Email address" wire:model.lazy="email" type="email" required autofocus />

            <x-slot name="footer">
                <div class="grid"> 
                    <x-button primary xl label="Send password reset link" type="submit" wire:click="sendResetPasswordLink"/>
                </div>
            </x-slot>
        </form>
        @endif
    </x-card>\
</div>
