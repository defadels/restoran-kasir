document.getElementById("idpesanan").addEventListener("change", function () {
  var id = this.value;
  if (id) {
    fetch("transaksi/get_order_data.php?id=" + id)
      .then((response) => response.json())
      .then((data) => {
        document.getElementById("nomor_meja").value = data.nomor_meja || "";
        document.getElementById("namapelanggan").value = data.Namapelanggan || "";
        document.getElementById("total").value = data.total || "";
        updateKembalian(); // update if Bayar already filled
      });
  } else {
    document.getElementById("nomor_meja").value = "";
    document.getElementById("namapelanggan").value = "";
    document.getElementById("total").value = "";
    document.getElementById("kembalian").value = "";
  }
});

document.getElementById("bayar").addEventListener("input", updateKembalian);
document.getElementById("total").addEventListener("input", updateKembalian);

function updateKembalian() {
  var total = parseFloat(document.getElementById("total").value) || 0;
  var bayar = parseFloat(document.getElementById("bayar").value) || 0;
  var kembalian = bayar - total;
  document.getElementById("kembalian").value = kembalian >= 0 ? kembalian : 0;
}
