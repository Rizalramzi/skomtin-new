
        let value = 0;

        document.getElementById('increment').addEventListener('click', function() {
            value++;
            document.getElementById('value').textContent = value;
        });

        document.getElementById('decrement').addEventListener('click', function() {
            if (value > 0) {
                value--;
                document.getElementById('value').textContent = value;
            }
        });


        document.addEventListener('DOMContentLoaded', () => {
            const addButtons = document.querySelectorAll('.addButton');
            
            addButtons.forEach(addButton => {
                const quantityControls = addButton.nextElementSibling; // Asumsi quantityControls berada setelah addButton
                const valueDisplay = quantityControls.querySelector('#value');
                let quantity = 0;
        
                addButton.addEventListener('click', () => {
                    addButton.classList.add('hidden'); // Sembunyikan tombol tambah
                    quantityControls.classList.remove('hidden'); // Tampilkan kontrol kuantitas
                    quantityControls.classList.add('flex'); // Terapkan flex untuk layout kontrol kuantitas
                    quantity = 1; // Mulai dengan 1 ketika tombol tambah pertama kali ditekan
                    valueDisplay.textContent = quantity;
                });
        
                quantityControls.querySelector('#increment').addEventListener('click', () => {
                    quantity++;
                    valueDisplay.textContent = quantity;
                });
        
                quantityControls.querySelector('#decrement').addEventListener('click', () => {
                    if (quantity > 1) {
                        quantity--;
                        valueDisplay.textContent = quantity;
                    } else {
                        quantityControls.classList.add('hidden'); // Sembunyikan kontrol kuantitas jika kuantitas 0
                        quantityControls.classList.remove('flex'); // Hapus flex agar tidak mempengaruhi layout
                        addButton.classList.remove('hidden'); // Tampilkan kembali tombol tambah
                    }
                });
            });
        });

        
// Keranjang
document.addEventListener('DOMContentLoaded', () => {
    const addButton = document.querySelector('.addButton');
    const quantityControls = document.getElementById('quantityControls');
    const valueDisplay = document.getElementById('value');
    const cartPopup = document.getElementById('cartPopup');
    const cartItems = document.getElementById('cartItems');
    const closeCartButton = document.getElementById('closeCart');
    const floatingIcon = document.getElementById('floatingIcon');

    let quantity = 0;
    let itemList = {}; // Menyimpan item dalam keranjang dengan ID

    addButton.addEventListener('click', () => {
        addButton.classList.add('hidden'); // Sembunyikan tombol tambah
        quantityControls.classList.remove('hidden'); // Tampilkan kontrol kuantitas
        quantityControls.classList.add('flex'); // Terapkan flex untuk layout kontrol kuantitas
        quantity = 1; // Mulai dengan 1 ketika tombol tambah pertama kali ditekan
        valueDisplay.textContent = quantity;

        // Tambahkan item ke keranjang
        const itemName = document.querySelector('h1').textContent; // Ambil nama item
        const itemPrice = document.querySelector('span').textContent; // Ambil harga item

        const itemId = `${itemName}-${itemPrice}`; // Buat ID unik untuk item

        if (!itemList[itemId]) {
            const listItem = document.createElement('li');
            listItem.textContent = `${itemName} - ${itemPrice}`;
            listItem.dataset.itemId = itemId; // Tambahkan data-item-id
            cartItems.appendChild(listItem);
            itemList[itemId] = listItem;
        }

        // Tampilkan pop-up keranjang
        cartPopup.classList.remove('hidden');
        floatingIcon.classList.add('hidden'); // Sembunyikan icon mengambang
    });

    document.getElementById('increment').addEventListener('click', () => {
        quantity++;
        valueDisplay.textContent = quantity;
        updateCartItem();
    });

    document.getElementById('decrement').addEventListener('click', () => {
        if (quantity > 1) {
            quantity--;
            valueDisplay.textContent = quantity;
            updateCartItem();
        } else {
            quantityControls.classList.add('hidden'); // Sembunyikan kontrol kuantitas jika kuantitas 0
            quantityControls.classList.remove('flex'); // Hapus flex agar tidak mempengaruhi layout
            addButton.classList.remove('hidden'); // Tampilkan kembali tombol tambah

            // Hapus item dari keranjang jika kuantitas 0
            const itemName = document.querySelector('h1').textContent; // Ambil nama item
            const itemPrice = document.querySelector('span').textContent; // Ambil harga item
            const itemId = `${itemName}-${itemPrice}`; // Buat ID unik untuk item

            if (itemList[itemId]) {
                cartItems.removeChild(itemList[itemId]);
                delete itemList[itemId];
            }

            if (Object.keys(itemList).length === 0) {
                cartPopup.classList.add('hidden');
                floatingIcon.classList.remove('hidden'); // Tampilkan icon mengambang
            }
        }
    });

    closeCartButton.addEventListener('click', () => {
        cartPopup.classList.add('hidden');
        floatingIcon.classList.remove('hidden'); // Tampilkan icon mengambang
    });

    floatingIcon.addEventListener('click', () => {
        cartPopup.classList.remove('hidden');
        floatingIcon.classList.add('hidden'); // Sembunyikan icon mengambang
    });

    function updateCartItem() {
        const itemName = document.querySelector('h1').textContent; // Ambil nama item
        const itemPrice = document.querySelector('span').textContent; // Ambil harga item
        const itemId = `${itemName}-${itemPrice}`; // Buat ID unik untuk item

        if (itemList[itemId]) {
            itemList[itemId].textContent = `${itemName} - ${itemPrice} (x${quantity})`;
        }
    }
});

// End Keranjang

