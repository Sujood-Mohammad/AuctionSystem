<!-- resources/views/Layout/master.blade.php -->
@include('Layout.header')

<main>
    <div>
        @yield('content')
    </div>
</main>

@include('Layout.footer')
