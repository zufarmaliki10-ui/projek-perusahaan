    <nav class="navbar navbar-expand-lg no-print">
        <div class="container-fluid">
            <div class="img-fluid">
                <img class="" src="{{asset('admin/hrd/img/logo_white_d.png')}}" alt="">
            </div>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('karyawan.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('karyawan.absensi')}}">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('karyawan.cuti')}}">Cuti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('karyawan.gaji')}}">Gaji</a>
                    </li>
                </ul>
                <div class="dropdown ms-lg-auto me-lg-4">
                    <a
                        class="dropdown-toggle text-light text-decoration-none"
                        data-bs-toggle="dropdown"
                        href=""
                        aria-expanded="">{{ auth()->user()->name }}</a>

                    <ul class="dropdown-menu">
                        <li class="my-2 p-2 menu">
                            <a href="">Settings</a>
                        </li>
                        <li class="my-2 p-2 menu">
                            <a href="{{route('logout')}}">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>