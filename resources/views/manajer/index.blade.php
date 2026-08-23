<!doctype html>
<html lang="en">
<!-- Head Section -->
@include('manajer.partials.head')
<!-- Head Section -->

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('manajer.component.sidebar')
        <!-- Sidebar -->
        <!-- Main Content -->
        <div class="main">
            <!-- Navbar -->
            @include('manajer.component.navbar')
            <!-- Navbar -->
            <!-- Alert -->
            @include('manajer.component.alert')
            <!-- Alert -->
            <!-- Main Content -->
            @yield('content')
            <!-- Main Content -->
            <!-- Footer Section -->
            @include('manajer.component.footer')
            <!-- Footer Section -->
        </div>
        <!-- Main Content -->
    </div>

    <!-- Script Section -->
    @include('manajer.partials.script')
    <!-- Script Section -->
</body>

</html>