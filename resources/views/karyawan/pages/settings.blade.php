@extends('karyawan.index')

@section('content')
<section class="main">
    <div class="card p-3 col-md-6 mx-auto my-3">

        <h4 class="mb-4">Ubah Password Akun</h4>

        <form action="{{ route('karyawan.settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Password Lama --}}
            <div class="mb-3">
                <label for="password_lama" class="form-label">
                    Password Lama
                </label>

                <input
                    id="password_lama"
                    class="form-control @error('password_lama') is-invalid @enderror"
                    type="password"
                    name="password_lama"
                    placeholder="Masukkan password lama"
                    required>

                @error('password_lama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Password Baru --}}
            <div class="mb-3">
                <label for="password_baru" class="form-label">
                    Password Baru
                </label>

                <input
                    id="password_baru"
                    class="form-control @error('password_baru') is-invalid @enderror"
                    type="password"
                    name="password_baru"
                    placeholder="Masukkan password baru"
                    required>

                @error('password_baru')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3">
                <label for="password_baru_confirmation" class="form-label">
                    Konfirmasi Password
                </label>

                <input
                    id="password_baru_confirmation"
                    class="form-control @error('password_baru_confirmation') is-invalid @enderror"
                    type="password"
                    name="password_baru_confirmation"
                    placeholder="Ulangi password baru"
                    required>

                @error('password_baru_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button
                type="submit"
                class="btn btn-primary d-block w-50 mx-auto my-3">
                Ubah Password
            </button>

        </form>

    </div>
</section>
@endsection