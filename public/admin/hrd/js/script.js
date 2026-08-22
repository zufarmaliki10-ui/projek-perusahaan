// toggle
const toggler = document.querySelector(".toggler-btn");
if (toggler) {
    toggler.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("collapsed");
        document.querySelector(".main").classList.toggle("expanded");
    });
}

// jam
function tanggalJam() {
    const sekarang = new Date();

    const tanggal = sekarang.toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });

    const jam = String(sekarang.getHours()).padStart(2, "0");
    const menit = String(sekarang.getMinutes()).padStart(2, "0");
    const detik = String(sekarang.getSeconds()).padStart(2, "0");

    const tanggalElement = document.getElementById("tanggal");
    const jamElement = document.getElementById("jam");

    if (tanggalElement) {
        tanggalElement.textContent = tanggal;
    }

    if (jamElement) {
        jamElement.textContent = `${jam}:${menit}:${detik}`;
    }
}

tanggalJam();
setInterval(tanggalJam, 1000);

// gaji
const gajiPokok = document.querySelector("#gajiPokok");
const tunjangan = document.querySelector("#tunjangan");
const lembur = document.querySelector("#uangLembur");
const totalGaji = document.querySelector("#total");

if (gajiPokok && tunjangan && lembur && totalGaji) {
    function hitungTotal() {
        const pokok = Number(gajiPokok.value) || 0;
        const tunjanganValue = Number(tunjangan.value) || 0;
        const lemburValue = Number(lembur.value) || 0;

        const total = pokok + tunjanganValue + lemburValue;

        totalGaji.textContent = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            maximumFractionDigits: 0,
        }).format(total);
    }

    tunjangan.addEventListener("input", hitungTotal);
    lembur.addEventListener("input", hitungTotal);

    hitungTotal();
}

//nyari departemen jabatan
const departemen = document.querySelector("#departemen");
const jabatan = document.querySelector("#jabatan");

if (departemen && jabatan) {
    departemen.addEventListener("change", function () {
        let departemenId = this.value;

        jabatan.innerHTML = '<option value="">Memuat jabatan....</option>';

        if (!departemenId) {
            jabatan.innerHTML =
                '<option value="">-- Pilih Departemen Terlebih Dahulu --</option>';
            return;
        }

        fetch(`/HRD/karyawan/jabatan/${departemenId}`)
            .then((response) => response.json())
            .then((data) => {
                jabatan.innerHTML =
                    '<option value="">-- Pilih Jabatan --</option>';
                data.forEach((item) => {
                    jabatan.innerHTML += `<option value="${item.id}">${item.nama_jabatan}</option>`;
                });
            })
            .catch((error) => {
                console.error("Gagal mengambil data jabatan:", error);

                jabatan.innerHTML = '<option value="">Data tidak ada</option>';
            });
    });
}

//nyari departemen karyawan
const departemenGaji = document.querySelector("#departemenGaji");
const karyawanGaji = document.querySelector("#karyawanGaji");

if (departemenGaji && karyawanGaji) {
    departemenGaji.addEventListener("change", function () {
        const departemenId = this.value;

        karyawanGaji.innerHTML =
            '<option value="">Memuat nama karyawan....</option>';

        if (!departemenId) {
            karyawanGaji.innerHTML =
                '<option value="">-- Pilih Departemen Terlebih Dahulu --</option>';
            return;
        }

        fetch(`/HRD/gaji/karyawan/${departemenId}`)
            .then((response) => response.json())
            .then((data) => {
                karyawanGaji.innerHTML =
                    '<option value="">-- Pilih Karyawan --</option>';
                data.forEach((item) => {
                    karyawanGaji.innerHTML += `<option value="${item.id}">${item.nama_lengkap}</option>`;
                });
            })
            .catch((error) => {
                console.error("Gagal mengambil data karyawan:", error);

                karyawanGaji.innerHTML =
                    '<option value="">Data tidak ada</option>';
            });
    });
}
