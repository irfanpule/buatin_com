<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

{{-- include standart header --}}
@include('includes.header')


<body>
    <div id="app">
        {{-- include navigasi --}}
        @include('includes.nav-primary')

        @yield('content')
    </div>

    {{-- include standart footer --}}
    @include('includes.footer')

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
</body>
</html>
