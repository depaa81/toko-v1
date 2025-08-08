let cart = [];
const cartItems = document.getElementById("cart-items");
const cartTotal = document.getElementById("cart-total");

function addToCart(name, price) {
  cart.push({ name, price });
  updateCart();
}

function removeItem(index) {
  cart.splice(index, 1);
  updateCart();
}

function updateCart() {
  cartItems.innerHTML = "";
  let total = 0;
  cart.forEach((item, index) => {
    const li = document.createElement("li");
    li.textContent = `${item.name} - Rp ${item.price}`;
    const btn = document.createElement("button");
    btn.textContent = "Hapus";
    btn.onclick = () => removeItem(index);
    li.appendChild(btn);
    cartItems.appendChild(li);
    total += item.price;
  });
  cartTotal.textContent = total;
}

function confirmOrder() {
  const message = cart.map(i => `${i.name} - Rp ${i.price}`).join("\n");
  window.open(`https://wa.me/6285693542022?text=Pesanan Saya:%0A${message}%0ATotal: Rp ${cart.reduce((a,b) => a + b.price, 0)}`, "_blank");
}

function uploadProof() {
  alert("Silakan kirim bukti transfer ke WhatsApp admin.");
}

document.getElementById("searchInput").addEventListener("input", function(e) {
  const term = e.target.value.toLowerCase();
  document.querySelectorAll(".product").forEach(p => {
    p.style.display = p.dataset.name.toLowerCase().includes(term) ? "block" : "none";
  });
});

function setDarkMode() {
  document.body.classList.add("dark-mode");
}
function setLightMode() {
  document.body.classList.remove("dark-mode");
}