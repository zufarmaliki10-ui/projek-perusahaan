// chart
const ctx = document.getElementById("myChart");

if (ctx) {
    const labels = window.absensiData.map((item) => item.status);
    const data = window.absensiData.map((item) => item.jumlah);
    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Akumulasi Absensi Karyawan",
                    data: data,
                    backgroundColor: [
                        "#6b9080ff",
                        "#a4c3b2ff",
                        "#cce3deff",
                        "#eaf4f4ff",
                    ],
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: "right",
                },
                title: {
                    display: true,
                    text: "Akumulasi Absensi Karyawan",
                },
            },
        },
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

    document.querySelectorAll(".tanggal").forEach((element) => {
        element.textContent = tanggal;
    });

    document.querySelectorAll(".jam").forEach((element) => {
        element.textContent = `${jam}:${menit}:${detik}`;
    });
}

tanggalJam();
setInterval(tanggalJam, 1000);

// jam pulamg
function cekJamPulang() {
    const sekarang = new Date();

    const jam = sekarang.getHours();
    const menit = sekarang.getMinutes();

    const totalMenit = jam * 60 + menit;

    const formPulang = document.getElementById("absenPulang");
    const formMasuk = document.getElementById("absenMasuk");

    if (!formPulang || !formMasuk) {
        return;
    }

    if (totalMenit >= 16 * 60 + 45) {
        formPulang.classList.remove("d-none");
        formMasuk.classList.add("d-none");
    }
}

cekJamPulang();
setInterval(cekJamPulang, 1000);

// Cek absensi izin / sakit
const kondisi = document.getElementById("status");
const keteranganIzin = document.getElementById("keteranganIzin");

if (kondisi && keteranganIzin) {
    kondisi.addEventListener("change", function () {
        if (["izin", "sakit"].includes(this.value)) {
            keteranganIzin.classList.remove("d-none");
        } else {
            keteranganIzin.classList.add("d-none");
        }
    });
}

setTimeout(() => {
    const alerts = document.querySelectorAll(".alert");

    alerts.forEach((alert) => {
        alert.remove();
    });
}, 1000);

// tooltip
const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]',
);
const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl),
);
