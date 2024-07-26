$(document).ready(function () {
    tableEmp();
    $('.bagian').select2();
    $('#id').val('');
    $('#emForm').trigger("reset");

    // tambah data
    $('#save-data').click(function (e) {
        e.preventDefault();

        Swal.fire({
            icon: 'info',
            title: 'Data Sedang diproses',
            showConfirmButton: false,
            // timer: 3000
        })

        $.ajax({
            data: $('#emForm').serialize(),
            url: BASE_URL + "Employee/store",
            type: "POST",
            dataType : 'json',
            success: function (response) {
                $('#emForm').trigger("reset");
                if (response.status === 'saved') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil disimpan',
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else if (response.status === 'exists') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Data sudah ada di database',
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else if (response.status === 'validation_failed') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Validasi gagal',
                        showConfirmButton: true
                    })
                } else if (response.status === 'updated') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }

                tableEmp();
            },
            error: function (data) {
                console.log('Error:', data);
                $('$save-data').html('Simpan Data');
            }
        });
    })

    //  hapus data
    // delete function
    $('body').on('click', '.delete', function (e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data('id');
                $.ajax({
                    url: BASE_URL + "Employee/delete/" + id,
                    // data: { id: id },
                    // type: 'DELETE'
                    method: 'POST'
                });
                Swal.fire(
                    'Deleted!',
                    'Data berhasil dihapus.',
                    'success'
                )
                tableEmp();
            }
        })
    });

    $('body').on('click', '.edit', function (e) {
        var id = $(this).data('id');
        $.ajax({
            url: BASE_URL + "Employee/vedit/" + id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(id);
                $('#id').val(id);
                $('#idkar').val(data.no_badge);
                $('#namakar').val(data.name);
                $('#rfidno').val(data.rfid_no);
                $('#bagian').val(data.bagian_id).trigger('change');
            }
        })
    })


});

function tableEmp() {
    $.ajax({
        url: BASE_URL + "employee/tableEm",
        type: "POST",
        success: function (data) {
            $('#div-table-em').html(data);
            $('#empTable').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}

// const flashAdd = $(".flash-add").data("flashdata");
// if (flashAdd) {
//     Swal.fire({
//         icon: "success",
//         title: "Selamat",
//         text: "Data Karyawan Berhasil " + flashAdd,
//         timer: 1000,
//         showConfirmButton: false,
//     });
// }

// const flashCek = $(".flash-cek").data("flashdata");
// if (flashCek) {
//     Swal.fire({
//         icon: "error",
//         title: "Maaf",
//         text: "Data Karyawan Sudah ada ",
//         timer: 1500,
//         showConfirmButton: false,
//     });
// }

// $('.select2').select2({
//     dropdownParent: $('#tambah')
// });

// $(".hapus-kar").on("click", function (e) {
//     // hentikan aksi default
//     e.preventDefault();
//     // jqueri cariin tombol hapus yang lagi saya click, lalu ambil atributnya
//     const href = $(this).attr("href");

//     Swal.fire({
//         title: "Are You Sure for Nonaktif Data?",
//         text: "Data Karyawan will be deleted!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, Nonaktif Data!",
//         // Jika hasilya true (tombol di pencet) jalankan fungsi dibawah
//     }).then((result) => {
//         if (result.value == true) {
//             document.location.href = href;
//         }
//     });
// });