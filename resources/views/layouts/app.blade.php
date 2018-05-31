@include('elements.head')
<body>
    <div id="app">
        @include('elements.header')
        @yield('content')
    </div>
    @include('elements.footer')
    @include('elements.script')
</body>
</html>