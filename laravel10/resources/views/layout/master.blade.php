@include('layout.header')

<div class="container">
    @yield('content')
    <hr>
    &copy; {{date('Y')}} Universitas Multi Data Palembang
</div>

@include('layout.footer')
