@extends('layouts.base')

@section('body')
    <div class="shadow-lg grid max-w-md w-full">
        @yield('content')
        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
