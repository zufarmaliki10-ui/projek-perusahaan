<!doctype html>
<html lang="en">
<!-- Head Section -->
@include('hrd.partials.head')
<!-- Head Section -->

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('hrd.component.sidebar')
        <!-- Sidebar -->
        <!-- Main Content -->
        <div class="main">
            <!-- Navbar -->
            @include('hrd.component.navbar')
            <!-- Navbar -->
            <!-- Alert -->
            @include('hrd.component.alert')
            <!-- Alert -->
            <!-- Main Content -->
            @yield('content')
            <!-- Main Content -->
            <!-- Footer Section -->
            @include('hrd.component.footer')
            <!-- Footer Section -->
        </div>
        <!-- Main Content -->
    </div>

    <!-- Script Section -->
    @include('hrd.partials.script')
    <!-- Script Section -->
</body>

</html>