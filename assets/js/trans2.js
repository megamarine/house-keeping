document.addEventListener('DOMContentLoaded', function () {
    function playNotificationSound() {
        var audio = new Audio('assets/minion.mp3');
        audio.play();
    }

    // Fungsi untuk menampilkan SweetAlert dengan suara
    function showAlertWithSound(title, message, type) {
        playNotificationSound();

        swal({
            title: title,
            text: message,
            icon: type,
        });
    }

    // Contoh penggunaan
    showAlertWithSound('Sukses', 'Data berhasil disimpan!', 'success');
});