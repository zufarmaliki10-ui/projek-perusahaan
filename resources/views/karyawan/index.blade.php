<!doctype html>
<html lang="en">
<!-- Head Section -->
@include('karyawan.partials.head')
<!-- Head Section -->

<body>
    <!-- Navbar Section -->
    @include('karyawan.component.navbar')
    <!-- Navbar Section -->
    <!-- Alert -->
    @include('karyawan.component.alert')
    <!-- Alert -->
    <!-- Main Content -->
    @yield('content')
    <!-- Main Content -->
    <!-- Footer Section -->
    @include('karyawan.component.footer')
    <!-- Footer Section -->
    <!-- Script Section -->
    @include('karyawan.partials.script')
    <!-- Script Section -->
</body>

</html>