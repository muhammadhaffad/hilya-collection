/* window.onscroll = function () {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
}
 */
const humberger = document.querySelector('#humberger');
const navMenu = document.querySelector('#nav-menu');

humberger.addEventListener('click', function () {
    navMenu.classList.toggle('hidden');
});

const loadMore = document.querySelector('#load-more');

if (loadMore != null) {
    loadMore.addEventListener('click', function () {
        document.querySelectorAll('.loading-products').forEach(function ($e) {
            $e.classList.toggle('hidden');
        });
        setTimeout(() => {
            Livewire.emit('prod-data');
        }, 2000);
    });
}

const smallImages = document.querySelectorAll('.small-image');
const mainImage = document.querySelector('#main-image');

if (smallImages != null && mainImage != null) {
    document.querySelectorAll('.small-image').forEach(function ($i) {
        $i.addEventListener('click', function($e) {
            var $src = $e.target.src;
            mainImage.src = $src;
            console.log($src);
        })
    })
}