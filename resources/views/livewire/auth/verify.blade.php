@section('title', 'Verify your email address')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>
    </div>

    <x-card title="Verify your email address" cardClasses="container max-w-screen-sm m-auto">

        @if (session('resent'))
            <x-badge positive lg label="A fresh verification link has been sent to your email address." icon="check-circle"
            class="m-auto"/>
        @endif
        
        <x-slot name="action">
            <x-button :href="route('logout')" label="sign out"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"/>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </x-slot>

        <p>Before proceeding, please check your email for a verification link.</p>

        <p class="mt-3">
            If you did not receive the email, 
            <a wire:click="resend" class="text-indigo-700 cursor-pointer 
                hover:text-indigo-600 focus:outline-none focus:underline 
                transition ease-in-out duration-150">click here to request another</a>.
        </p>
    </x-card>
</div>
