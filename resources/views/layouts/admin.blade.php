@extends('layouts.base')

@section('body')
    @auth
    <section class="md:grid grid-cols-[250px,5fr] w-full">
        <livewire:admin.sidebar />
        @yield('content')
        @isset($slot)
            {{ $slot }}
        @endisset
    </section>
    @else
    please login
    @endauth

@endsection
