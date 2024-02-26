function playNotificationSound() {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'http://localhost:8010/house-keeping/assets/minion.mp3');
	audioElement.play();
}

const flashTransaksi = $(".flash-transaksi").data("flashdata");
if (flashTransaksi) {
	playNotificationSound();
	Swal.fire({
		icon: "success",
		title: "Selamat",
		text: "Transaksi Peminjaman Berhasil " + flashTransaksi,
        timer: 1000,
        showConfirmButton: false,
	});
}

const flashCek = $(".flash-cek").data("flashdata");
if (flashCek) {
	playNotificationSound();
	Swal.fire({
		icon: "error",
		title: "Maaf",
		text: "Transaksi Telah dilakukan",
        timer: 1000,
        showConfirmButton: false,
	});
}

const flashCekData = $(".flash-cekdata").data("flashdata");
if (flashCekData) {
	Swal.fire({
		icon: "error",
		title: "Maaf",
		text: "Data Karyawan tidak " + flashCekData,
        timer: 1000,
        showConfirmButton: false,
	});
}

const flashCekDataTrans = $(".flash-cekdatatrans").data("flashdata");
if (flashCekDataTrans) {
	Swal.fire({
		icon: "error",
		title: "Maaf",
		text: "Status Transaksi terakhir " + flashCekDataTrans,
        timer: 1000,
        showConfirmButton: false,
	});
}

const flashKembali = $(".flash-kembali").data("flashdata");
if (flashKembali) {
	Swal.fire({
		icon: "success",
		title: "Selamat",
		text: "Transaksi Peminjaman Berhasil " + flashKembali,
        timer: 1000,
        showConfirmButton: false,
	});
}