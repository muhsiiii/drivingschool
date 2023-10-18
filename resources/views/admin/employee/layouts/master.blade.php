@include('admin.employee.layouts.header')
@include('admin.employee.layouts.sidebar')
<body class="hold-transition sidebar-mini layout-fixed">
    {{-- <div class="content-wrapper contents-hr-application-page"> --}}
        @yield('content')
    {{-- </div> --}}
</body>
@include('admin.employee.layouts.footer')

