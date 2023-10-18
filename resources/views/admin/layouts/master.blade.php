@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<body class="hold-transition sidebar-mini layout-fixed">
    {{-- <div class="content-wrapper contents-hr-application-page"> --}}
        @yield('content')
    {{-- </div> --}}
</body>
@include('admin.layouts.footer')

