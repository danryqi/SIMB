function tampilkanmenu() {
    $.getJSON('data.json', function(data) {
        console.log(data); 
        console.log(data.gempa); 

        let gempa = data.gempa;
        if (Array.isArray(gempa)) {
            $.each(gempa, function(i, data) {
                let mapId = `map${i}`;

                $('#isi').append(
                    `
                    <div class="col-md-4">
                        <div class="card mb-3" style="padding:10px; border-radius: 30px; border: 0; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);">
                            <div class="d-flex align-items-center justify-content-center">
                                <div id="${mapId}" style="height: 200px; width: 300px; border-radius: 20px;"></div>
                            </div>
                            <div class="card-body text-start">
                                <div class="d-inline-flex">
                                    <i class="bi bi-geo-fill me-2" style="color:#f35525;"></i>
                                    <p class="mb-1" style="font-size: 16px; font-weight: bold;">${data.Wilayah}</p>
                                </div>
                                <p class="mb-1" style="font-size: 14px; margin-left:25px;">${data.Tanggal} - ${data.Jam}</p>
                                <p class="mb-1" style="font-size: 14px; margin-left:25px;">Kekuatan : ${data.Magnitude} SR</p>
                                <a href="#" class="card-link see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${data.ID}" style="font-size: 14px; margin-left:25px; text-decoration: none;font-style:italic; color: grey;">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    `
                );

                // Memisahkan koordinat ke dalam latitude dan longitude
                const [lat, lon] = data.Coordinates.split(",").map(Number);

                // Membuat peta baru pada div dengan ID `mapId`
                const map = L.map(mapId).setView([lat, lon], 10);

                // Menambahkan layer peta dari OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                // Menambahkan marker dengan popup informasi
                L.marker([lat, lon]).addTo(map);
            });

            // Event listener untuk tombol "Lihat Detail"
            $('.see-detail').on('click', function() {
                const gempaId = $(this).data('id');
                const gempaDetail = gempa.find(g => g.ID == gempaId);

                if (gempaDetail) {
                    $('#modal-content').html(`
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="modalMap" style="height: 300px; width: 240px; border-radius: 20px;"></div>
                                </div>
                                <div class="col-md-8">
                                    <ul class="list-group">
                                        <li class="list-group-item"><h5> ${gempaDetail.Wilayah}</h3></li>
                                        <li class="list-group-item">Tanggal&emsp;&emsp; : &emsp; ${gempaDetail.Tanggal}</li>
                                        <li class="list-group-item">Jam&emsp;&emsp;&emsp;&emsp;: &emsp;${gempaDetail.Jam}</li>
                                        <li class="list-group-item">Magnitude&emsp;: &emsp;${gempaDetail.Magnitude} SR</li>
                                        <li class="list-group-item">Kedalaman&emsp;: &emsp;${gempaDetail.Kedalaman}</li>
                                        <li class="list-group-item">Koordinat&emsp;&nbsp;: &emsp;${gempaDetail.Coordinates}</li>
                                        <li class="list-group-item">Potensi&emsp;&emsp;&nbsp;&nbsp;: &emsp;${gempaDetail.Potensi}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `);

                    // Memisahkan koordinat ke dalam latitude dan longitude
                    const [lat, lon] = gempaDetail.Coordinates.split(",").map(Number);

                    // Menginisialisasi ulang peta untuk modal
                    setTimeout(() => {
                        const modalMap = L.map('modalMap').setView([lat, lon], 10);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                        }).addTo(modalMap);
                        L.marker([lat, lon]).addTo(modalMap);
                    }, 200);
                }
            });
        } else {
            console.error("Data gempa tidak ditemukan atau bukan array.");
        }
    }).fail(function() {
        console.error("Gagal mengambil data dari data.json");
    });
}



// Panggil fungsi untuk menampilkan menu dan peta
tampilkanmenu();




function updateTime() {
    const timeElement = document.getElementById("time");

    // Ambil waktu saat ini
    const now = new Date();

    // Hari dalam format bahasa Indonesia
    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    const dayName = days[now.getDay()];

    // Bulan dalam format bahasa Indonesia
    const months = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    const monthName = months[now.getMonth()];

    // Ambil tanggal, bulan, dan tahun
    const date = now.getDate();
    const year = now.getFullYear();

    // Format jam, menit, dan detik
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');

    // Gabungkan hasil
    const formattedDate = `${dayName}, ${date} ${monthName} ${year}`;
    const formattedTime = `${hours}:${minutes}:${seconds}`;

    // Tampilkan ke elemen HTML
    timeElement.textContent = `${formattedDate} - ${formattedTime}`;
}

// Perbarui waktu setiap detik
setInterval(updateTime, 1000);

// Panggil fungsi pertama kali saat halaman dimuat
updateTime();

