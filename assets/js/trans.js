const flashTransaksi = $(".flash-transaksi").data("flashdata");
if (flashTransaksi) {
	Swal.fire({
		icon: "success",
		title: "Selamat",
		text: "Transaksi Peminjaman Berhasil " + flashTransaksi,
        timer: 3000,
        showConfirmButton: false,
	});
}

const flashCek = $(".flash-cek").data("flashdata");
if (flashCek) {
	Swal.fire({
		icon: "error",
		title: "Maaf",
		text: "Transaksi Telah dilakukan",
        timer: 3000,
        showConfirmButton: false,
	});
}

const flashKembali = $(".flash-kembali").data("flashdata");
if (flashKembali) {
	Swal.fire({
		icon: "success",
		title: "Selamat",
		text: "Transaksi Peminjaman Berhasil " + flashKembali,
        timer: 3000,
        showConfirmButton: false,
	});
}