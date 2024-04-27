
const inputHarga = document.querySelectorAll('.harga-input');

// Iterasi melalui setiap elemen input dan tambahkan event listener
inputHarga.forEach(function(input) {
    input.addEventListener('input', function() {
        let rawValue = this.value.replace(/\D/g, ''); // Hapus karakter selain digit

        if (rawValue.length > 0) {
            // Format angka dengan tanda titik sebagai pemisah ribuan
            let formattedValue = parseInt(rawValue).toLocaleString('id-ID');
            this.value = formattedValue;
        }
    });
});
