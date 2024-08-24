@extends('layouts.base')

@section('body')
    @auth
        <div class="absolute top-1 right-1">
            <x-dropdown>
                <x-slot name="trigger">
                    <x-button label="{{auth()->user()->name}}" primary />
                </x-slot>
             
                <x-dropdown.item label="Dashboard" href="{{route('adminIndex')}}" />
                {{-- <x-dropdown.item separator label="Live Chat" /> --}}
                <x-dropdown.item separator label="Logout" href="{{route('getlogout')}}" />
            </x-dropdown>
            {{-- <x-button label="Admin Dashboard"/> --}}
        </div>
    @endauth

    @yield('content')
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
