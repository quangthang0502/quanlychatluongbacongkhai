<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.head')
    @yield('style')
</head>
<body class="">

<div class="wrapper ">
    @include('admin.include.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
    @include('template.navbar')
    <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('template.footer')
    </div>
</div>

@include('template.script')
@yield('script')
</body>
</html>