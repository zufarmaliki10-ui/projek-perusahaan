@include('hrd.partials.head')

<body>
    <a class="btn btn-danger btn-sm m-2" href="{{route('logout')}}">Logout</a>
    <div class="col-md-8 mx-auto my-3">
        <h3>Tambah HRD / Manajer</h3>
        <form action="{{route('superadmin.dashboard.account')}}" method="post">
            @csrf
            <label class="form-label mt-2" for="name">Nama HRD / Manajer</label>
            <input class="form-control" type="text" name="name" id="name">
            <label class="form-label mt-2" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email">
            <label class="form-label" for="role">Role</label>
            <select class="form-select" name="role" id="role">
                <option value="">-- Pilih Role --</option>
                <option value="hrd">HRD</option>
                <option value="manajer">Manajer</option>
            </select>
            <label class="form-label mt-2" for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password">
            <label class="form-label mt-2" for="password">Konfirmasi Password</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
            <div class="my-3 justify-content-center d-flex">
                <button class="btn btn-primary w-50" type="submit">Buat Akun</button>
            </div>
        </form>
    </div>
    @include('hrd.partials.script')
</body>
