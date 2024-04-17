@include('layouts.partials.head')
<!-- Header -->
@include('layouts.partials.header')

@yield('page_dependencies')

<!-- Sidebar -->
@include('layouts.partials.sidebar')

<!-- Main Content -->
<div class="content">
    @yield('content')
</div>

<!-- Footer -->
@include('layouts.partials.footer')
</div><!-- am-mainpanel -->
<!-- Include JavaScript files -->
{{--<script src="{{ asset('js/global.js') }}"></script>--}}

@include('layouts.partials.scripts')

@stack('scripts')

@yield('page_script')
</body>
</html>
