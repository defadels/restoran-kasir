function hitungTotal() {
  let total = 0;

  // Loop all checkboxes
  document.querySelectorAll('input[name="idmenu[]"]').forEach((cb) => {
    if (cb.checked) {
      const idmenu = cb.value;
      const harga = parseInt(cb.getAttribute("data-harga")) || 0;
      const jumlahInput = document.querySelector(`input[name="jumlah[${idmenu}]"]`);
      const jumlah = parseInt(jumlahInput?.value) || 0;

      total += harga * jumlah;
    }
  });

  // Set the total
  document.getElementById("totalHarga").textContent = "Rp. " + total.toLocaleString("id-ID");
  document.getElementById("inputTotal").value = Number(total);

  // console.log(total);
}

// Run total calculation when page is loaded
document.addEventListener("DOMContentLoaded", function () {
  hitungTotal();

  // Attach event listeners after DOM is ready
  document.querySelectorAll('input[name="idmenu[]"]').forEach((cb) => {
    cb.addEventListener("change", hitungTotal);
  });

  document.querySelectorAll('input[name="jumlah[]"]').forEach((input) => {
    input.addEventListener("change", hitungTotal);
  });
});
