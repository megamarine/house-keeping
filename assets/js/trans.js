const flashTransaksi = $(".flash-transaksi").data("flashdata");
if (flashTransaksi) {
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
	soundCek();
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
	soundCek(); 
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
	playNotificationSound();
	Swal.fire({
		icon: "success",
		title: "Selamat",
		text: "Transaksi Peminjaman Berhasil " + flashKembali,
        timer: 1000,
        showConfirmButton: false,
	});
}

function playNotificationSound() {
	var audioElement = document.createElement('audio');
    var url = BASE_URL + "assets/ty.mp3";
    audioElement.setAttribute('src', url);
	audioElement.play();
}

function soundCek() {
	var audioElement = document.createElement('audio');
    var url = BASE_URL + "assets/trans_telah_dilakukan.mp3";
    audioElement.setAttribute('src', url);
	audioElement.play();
}