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
                <div class="d-flex ms-lg-auto me-lg-4">
                    <a
                        class="dropdown-toggle text-light text-decoration-none align-content-center me-2"
                        data-bs-toggle="dropdown"
                        href=""
                        aria-expanded="">{{ auth()->user()->name }}</a>
                    <div>
                        <a href="{{route('logout')}}"
                            class="btn btn-danger btn-sm bi bi-door-open-fill"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Logout"></a>
                        <a href="{{route('karyawan.settings')}}"
                            class="btn btn-secondary btn-sm bi bi-gear-fill"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Ubah Password"></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>