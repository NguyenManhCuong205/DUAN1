document.addEventListener('DOMContentLoaded', () => {
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    const cartCount = document.querySelector('.cart-count');

    addToCartBtn.addEventListener('click', () => {
        let count = parseInt(cartCount.textContent) || 0;
        cartCount.textContent = count + 1;
        alert("Đã thêm vào giỏ hàng!");
    });
});
