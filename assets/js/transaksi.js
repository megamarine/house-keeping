$(document).ready(function () {
    tableRekapTrans();
    $('#id').val('');
    $('#updateForm').trigger("reset");

    /// tambah data
    $('#save-data').click(function (e) { 
        e.preventDefault();

        Swal.fire({
            icon: 'info',
            title: 'Data Sedang diproses',
            showConfirmButton: false,
            // timer: 3000
        })

        $.ajax({
            data: $('#updateForm').serialize(),
            url: BASE_URL + "index.php/transaksi/store",
            type: "POST",
            datatype: 'json',
            success: function(data) {
                $('#updateForm').trigger("reset");
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil diupdate',
                    showConfirmButton: false,
                    timer: 1500
                })
                tableRekapTrans();
            },
            error: function(data) {
                console.log('Error:', data);
                $('$save-data').html('Update Data');
            }
        });
     })

    $('body').on('click','.edit',function (e) {
        var id = $(this).data('id');
        $.ajax({
            url: BASE_URL + "index.php/transaksi/vedit/" + id,
            type: 'GET',
            dataType : 'json',            
            success: function (data) {
                console.log(data);
                $('#id').val(id);
                $('#rfid_no').val(data.rfid_no);
                // $('#nama_dept').val(data.nama_dept);
                
            }
        })
    })


});

function tableRekapTrans() {
    $.ajax({
        url: BASE_URL + "index.php/transaksi/tableRekapTrans",
        type: "POST",
        success: function (data) {
            $('#div-table-rekap-trans').html(data);
            $('#rekaptransTable').DataTable({
                "processing": true,
                "responsive": true,
                "serverside": true,
            });
        }
    });
}