const ctx = document.getElementById("myChart");

new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: ["Hadir", "Izin", "Sakit", "Alfa"],
        datasets: [
            {
                label: "",
                data: [12, 19, 3, 5],
                backgroundColor: ["#008000", "#ff4500", "#808080", "#ff0000"],
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
                text: "Presentasi Karyawan",
            },
        },
    },
});

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

    document.getElementById("tanggal").textContent = tanggal;
    document.getElementById("jam").textContent = `${jam}:${menit}:${detik}`;
}

tanggalJam();
setInterval(tanggalJam, 1000);

function cekJamPulang() {
    const sekarang = new Date();

    const jam = sekarang.getHours();
    const menit = sekarang.getMinutes();

    const totalMenit = jam * 60 + menit;

    const formPulang = document.getElementById("absenPulang");
    const formMasuk = document.getElementById("absenMasuk");

    if (totalMenit >= 16 * 60 + 45) {
        formPulang.classList.remove("d-none");
    }
}

cekJamPulang();
setInterval(cekJamPulang, 1000);
