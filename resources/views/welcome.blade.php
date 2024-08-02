@extends('layouts.app')

@section('content')
<nav>
    @if (Route::has('login'))
        <div class="p-6 text-right sm:fixed sm:top-0 sm:right-0">
            @auth
            welcome {{Auth::user()->name}}
            <x-button :href="route('home')" label="Home"/>

            <x-button :href="route('logout')" label="sign out"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"/>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <x-button :href="route('login')" label="Log in"/>
                @if (Route::has('register'))
                <x-button :href="route('register')" label="Register"/>
                @endif
            @endauth
        </div>
    @endif
</nav>
    <main class="container m-auto p-4 my-24 bg-primary-100/20 rounded-md shadow">
        <x-button onclick="window.$wireui.confirmNotification({
            title: 'This is work?',
            description: 'fire notification?',
            icon: 'question',
            accept: {
                label: 'Yes, save it',
                method: 'save',
                params: 'Saved'
            },
            reject: {
                label: 'No, cancel',
                method: 'cancel'
            }
        })"
            label="Fire Confirm Notification"
        />
    </main>
@endsection
