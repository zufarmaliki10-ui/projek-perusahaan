<aside id="sidebar">
    <!-- Toggle Btn -->
    <div class="sidebar-toggle d-flex justify-content-center py-1">
        <button
            class="toggler-btn bi bi-list fs-5 text-light"
            type="button"
            style="height: 30px"></button>
    </div>
    <!-- Toggle Btn -->
    <!-- Sidebar Logo -->
    <div class="sidebar-logo justify-content-center py-1">
        <img src="{{asset('admin/hrd/img/logo_white_d.png')}}" alt="logo">
    </div>
    <!-- Sidebar Logo -->
    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a class="sidebar-link {{request()->routeIs('HRD.dashboard') ? 'active' : ''}}" href="{{route('HRD.dashboard')}}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{request()->routeIs('HRD.departemen') ? 'active' : ''}}" href="{{route('HRD.departemen')}}">
                <i class="bi bi-building-fill"></i>
                <span>Departemen</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{request()->routeIs('HRD.karyawan') ? 'active' : ''}}" href="{{route('HRD.karyawan')}}">
                <i class="bi bi-people-fill"></i>
                <span>Karyawan</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{request()->routeIs('HRD.absensi') ? 'active' : ''}}" href="{{route('HRD.absensi')}}">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Absensi</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{request()->routeIs('HRD.cuti') ? 'active' : ''}}" href="{{route('HRD.cuti')}}">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Cuti</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{request()->routeIs('HRD.gaji') ? 'active' : ''}}" href="{{route('HRD.gaji')}}">
                <i class="bi bi-cash-stack"></i>
                <span>Gaji</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{request()->routeIs('logout') ? 'active' : ''}}" href="{{route('logout')}}">
                <i class="bi bi-door-open-fill"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
    <!-- Sidebar Navigation -->
</aside>
