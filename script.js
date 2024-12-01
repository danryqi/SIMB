
// Pastikan div #bigMap berada di dalam kontainer yang benar di HTML
$('#mainContent').prepend(`<div id="bigMap" class="px-5" style="height: 500px; width: 100%; border-radius: 20px; margin-bottom: 20px;"></div>`);

function tampilkanmenu() {
    $.getJSON('data.json', function(data) {
        console.log(data);
        console.log(data.gempa);

        let gempa = data.gempa;
        const initialCount = 7; // Jumlah item yang akan ditampilkan pertama kali
        let displayedCount = initialCount;

        if (Array.isArray(gempa)) {
            // Buat peta besar di atas daftar, hanya sekali
            const map = L.map('bigMap').setView([-2.5489, 118.0149], 5); // Pusat default pada Indonesia

            // Tambahkan layer peta dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            // Inisialisasi daftar item gempa
            $('#isi').html(''); // Kosongkan kontainer terlebih dahulu

            // Fungsi untuk menampilkan daftar gempa dalam jumlah tertentu
            function renderGempaList(count) {
                $('#isi').html(''); // Kosongkan daftar sebelum menampilkan ulang

                // Iterasi untuk menampilkan sejumlah item gempa
                $.each(gempa.slice(0, count), function(i, data) {
                    // Memisahkan koordinat ke dalam latitude dan longitude
                    const [lat, lon] = data.Coordinates.split(",").map(Number);

                    // Tambahkan marker ke peta besar
                    const marker = L.marker([lat, lon]).addTo(map)
                        .bindPopup(`<b>${data.Wilayah}</b><br>${data.Tanggal} - ${data.Jam}<br>Kekuatan: ${data.Magnitude} SR`);

                    // Tambahkan item gempa ke daftar
                    $('#isi').append(
                        `
                        <div class="row justify-content-start">
                            <div class="col-12">
                                <div class="card mb-2 gempa-card" style="border: 0; border-radius:0px; cursor: pointer; background-color: #122d4f;" data-lat="${lat}" data-lon="${lon}">
                                    <div class="row d-inline-flex">
                                        <div class="col-2 d-flex justify-content-center align-items-center" style="background-color:#f35525;">
                                            <i class="bi bi-geo-fill me-2" style="color:#ffffff; font-size:30px"></i>
                                        </div>
                                        <div class="col-10 text-white p-2" style="border-radius: 0px">
                                            <p class="mb-1" style="font-size: 16px; margin-left:25px; font-weight: bold;">${data.Wilayah}</p>
                                            <p class="mb-1" style="font-size: 14px; margin-left:25px;">${data.Tanggal} - ${data.Jam}</p>
                                            <p class="mb-1" style="font-size: 14px; margin-left:25px;">Kekuatan : ${data.Magnitude} SR</p>
                                            <div class="additional-info" style="display: none;">
                                                <p class="mb-1" style="font-size: 14px; margin-left:25px;">Kedalaman : ${data.Kedalaman}</p>
                                                <p class="mb-1" style="font-size: 15px; margin-left:25px; font-weight: bold;">${data.Potensi}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `
                    );
                });

                // Tambahkan tombol "Lihat Selengkapnya" jika ada lebih banyak data untuk ditampilkan
                if (count < gempa.length) {
                    $('#isi').append(`
                        <div class="text-center mt-3 row col-12 px-5">
                            <button id="loadMoreBtn" class="btn">Lihat Selengkapnya</button>
                        </div>
                    `);
                }
            }

            // Panggil fungsi render pertama kali dengan jumlah awal
            renderGempaList(displayedCount);

            // Event listener untuk memuat lebih banyak gempa saat tombol "Lihat Selengkapnya" diklik
            $('#isi').on('click', '#loadMoreBtn', function() {
                displayedCount += initialCount; // Tambahkan jumlah item yang akan ditampilkan
                renderGempaList(displayedCount); // Tampilkan ulang dengan jumlah yang ditingkatkan
            });

            // Event listener pada setiap item gempa untuk memperbesar peta ke lokasi yang dipilih dengan efek zoom
            $('#isi').on('click', '.card', function() {
                const lat = $(this).data('lat');
                const lon = $(this).data('lon');

                // Scroll ke posisi peta (bigMap)
                $('html, body').animate({
                    scrollTop: $('#bigMap').offset().top - 20 // Menambahkan sedikit jarak di atas peta
                }, 500, function() {
                    // Setelah selesai scroll, lakukan zoom in ke lokasi
                    map.flyTo([lat, lon], 10, {
                        animate: true,
                        duration: 1.5 // Durasi transisi dalam detik
                    });
                });
            });

            // Event hover untuk membuat kartu lain menjadi pudar saat satu kartu di-hover
            $('#isi').on('mouseenter', '.gempa-card', function() {
                $(this).find('.additional-info').slideDown(); // Tampilkan informasi tambahan
                $('.gempa-card').not(this).css('opacity', '0.5'); // Memudarkan kartu lainnya
                $(this).css({
                    'height': 'auto', // Menambah tinggi kartu yang di-hover
                    'box-shadow': '0px 4px 15px rgba(0, 0, 0, 0.8)' // Efek bayangan
                });
            }).on('mouseleave', '.gempa-card', function() {
                $(this).find('.additional-info').slideUp(); // Sembunyikan informasi tambahan
                $('.gempa-card').css('opacity', '1'); // Mengembalikan opacity ke semua kartu
                $(this).css({
                    'height': '', // Mengembalikan tinggi kartu ke ukuran asli
                    'box-shadow': '' // Menghapus bayangan
                });
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

