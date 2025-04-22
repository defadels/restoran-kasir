function hitungTotal() {
  let total = 0;
  const checkboxes = document.querySelectorAll('input[name="idmenu[]"]');

  checkboxes.forEach((checkbox) => {
    if (checkbox.checked) {
      const idmenu = checkbox.value;
      const harga = parseInt(checkbox.dataset.harga);
      const jumlahInput = document.querySelector(`input[name="jumlah[${idmenu}]"]`);
      const jumlah = parseInt(jumlahInput.value) || 0;

      total += harga * jumlah;
    }
  });

  // Update total display
  const totalDisplay = document.getElementById("totalHarga");
  totalDisplay.textContent = "Rp. " + total.toLocaleString("id-ID");

  // Update hidden input
  const inputTotal = document.getElementById("inputTotal");
  inputTotal.value = total;
}

// Trigger update on checkbox or jumlah input change
document.querySelectorAll('input[name="idmenu[]"]').forEach((cb) => {
  cb.addEventListener("change", hitungTotal);
});

document.querySelectorAll('input[name^="jumlah"]').forEach((input) => {
  input.addEventListener("input", hitungTotal);
});

// Run on load
document.addEventListener("DOMContentLoaded", hitungTotal);
