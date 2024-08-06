$(document).ready(function () {
    tablePinjam();
    $('#id').val('');
    $('#pinjam').trigger("reset");

    $('#save-data').click(function (e) { 
        e.preventDefault();

        Swal.fire({
            icon: 'info',
            title: 'Data Sedang diproses',
            showConfirmButton: false,
            timer: 3000
        });

        $.ajax({
            data: $('#pinjam').serialize(),
            url: BASE_URL + "index.php/transaksi/pinjam2",
            type: "POST",
            dataType: 'json',
            success: function(response) {
                console.log(response); // Tambahan untuk debug
                console.log("Swal loaded")
                $('#pinjam').trigger("reset");

                // Menambahkan default handling jika tidak ada yang cocok
                let alertConfig = {
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan yang tidak diketahui',
                    showConfirmButton: false,
                    timer: 2000
                };

                if (response.alert === 'saved') {
                    playNotificationSound();
                    alertConfig = {
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil disimpan',
                        showConfirmButton: false,
                        timer: 2000
                    };
                } else if (response.alert === 'cekdata') {
                    alertConfig = {
                        icon: 'error',
                        title: 'Error',
                        text: 'Data Karyawan Tidak ada',
                        showConfirmButton: true,
                        // timer: 2000
                    };
                } else if (response.alert === 'cekstatus') {
                    alertConfig = {
                        icon: 'error',
                        title: 'Error',
                        text: 'Transaksi Sebelumnya Belum Selesai',
                        showConfirmButton: true,
                        // timer: 2000
                    };
                } else if (response.alert === 'cektrans') {
                    alertConfig = {
                        icon: 'info',
                        title: 'Info',
                        text: 'Transaksi Telah Dilakukan',
                        showConfirmButton: true,
                        // timer: 2000
                    };
                }

                Swal.fire(alertConfig);
                tablePinjam();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error:', textStatus, errorThrown);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan, silakan coba lagi',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
     });
});


function tablePinjam() {
    $.ajax({
        url: BASE_URL + "index.php/transaksi/tablePinjam",
        type: "POST",
        success: function (data) {
            $('#div-table-pinjam').html(data);
            $('#pinjamTable').DataTable({
                "processing": true,
                "responsive": true,
                "serverside": true,
            });
        }
    });
}

function playNotificationSound() {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'http://localhost/house-keeping/assets/g_trims.mp3');
	audioElement.play();
}

function soundCek() {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'http://localhost/house-keeping/assets/gojek_id.mp3');
	audioElement.play();
}