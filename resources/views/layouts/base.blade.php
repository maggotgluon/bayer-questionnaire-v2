<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <script defer src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @stack('meta')
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
        @wireUiScripts

        @livewireChartsScripts
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if ( env('ANALYTICS_PROPERTY_ID') )
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            
                ga('create', '{{env('ANALYTICS_PROPERTY_ID')}}', 'auto');
                ga('send', 'pageview');
            
            </script>
        @endif

        @if ( env('ANALYTICS_GTM_ID') )
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','{{env('ANALYTICS_GTM_ID')}}');</script>
		<!-- End Google Tag Manager -->

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{env('ANALYTICS_GTM_ID')}}"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
        @endif



    </head>

    <body class="w-full min-h-screen grid justify-items-center">
        <x-notifications z-index="z-50" />
        @yield('body')
    </body>
</html>
