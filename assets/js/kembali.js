$(document).ready(function () {
    tableKembali();
    $('#id').val('');
    $('#kembali').trigger("reset");

    $('#save-data').click(function (e) { 
        e.preventDefault();

        Swal.fire({
            icon: 'info',
            title: 'Data Sedang diproses',
            showConfirmButton: false,
            timer: 3000
        });

        $.ajax({
            data: $('#kembali').serialize(),
            url: BASE_URL + "index.php/transaksi/kembali",
            type: "POST",
            dataType: 'json',
            success: function(response) {
                console.log(response); // Tambahan untuk debug
                console.log("Swal loaded")
                $('#kembali').trigger("reset");

                // Menambahkan default handling jika tidak ada yang cocok
                let alertConfig = {
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan yang tidak diketahui',
                    showConfirmButton: false,
                    timer: 2000
                };

                if (response.alert === 'updated') {
                    alertConfig = {
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil dikembalikan',
                        showConfirmButton: false,
                        timer: 2000
                    };
                } else if (response.alert === 'cek') {
                    alertConfig = {
                        icon: 'error',
                        title: 'Error',
                        text: 'Transaksi Sudah dilakukan',
                        showConfirmButton: false,
                        timer: 2000
                    };
                }
                Swal.fire(alertConfig);
                tableKembali();
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


function tableKembali() {
    $.ajax({
        url: BASE_URL + "index.php/transaksi/tableKembali",
        type: "POST",
        success: function (data) {
            $('#div-table-kembali').html(data);
            $('#kembaliTable').DataTable({
                "processing": true,
                "responsive": true,
                "serverside": true,
            });
        }
    });
}