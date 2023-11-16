const flashAdd = $(".flash-add").data("flashdata");
if (flashAdd) {
	Swal.fire({
		icon: "success",
		title: "Selamat",
		text: "Data Karyawan Berhasil " + flashAdd,
        timer: 1000,
        showConfirmButton: false,
	});
}

const flashCek = $(".flash-cek").data("flashdata");
if (flashCek) {
	Swal.fire({
		icon: "error",
		title: "Maaf",
		text: "Data Karyawan Sudah ada ",
        timer: 1500,
        showConfirmButton: false,
	});
}

$('.select2').select2({
	dropdownParent: $('#tambah')
  });

  $(".hapus-kar").on("click", function (e) {
	// hentikan aksi default
	e.preventDefault();
	// jqueri cariin tombol hapus yang lagi saya click, lalu ambil atributnya
	const href = $(this).attr("href");

	Swal.fire({
		title: "Are You Sure for Nonaktif Data?",
		text: "Data Karyawan will be deleted!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, Nonaktif Data!",
		// Jika hasilya true (tombol di pencet) jalankan fungsi dibawah
	}).then((result) => {
		if (result.value == true) {
			document.location.href = href;
		}
	});
});