const searchProduct = document.querySelector('#search-product');

if (searchProduct !== null) {
    searchProduct.addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            console.log('Cari');
        }
    });
}