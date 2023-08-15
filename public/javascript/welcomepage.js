// change icon (dark mode)
const mode = document.querySelector('.mode');
const icon = document.querySelector('.fa-moon');
const siluet = document.querySelector('.siluet-kilau');

mode.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');

    if(document.body.classList.contains('dark-mode')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
        siluet.classList.add('siluet-dark');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
        siluet.classList.remove('siluet-dark');
    }
});

// Change tombol-bar navtop
const bars = document.querySelector('.tombolbar');
const navtop = document.querySelector('header .navtop');

bars.addEventListener('click', function() {
    if(bars.classList.contains('fa-bars')) {
        bars.classList.remove('fa-bars');
        bars.classList.add('fa-xmark');
        navtop.classList.add('slide');
    } else {
        bars.classList.remove('fa-xmark');
        bars.classList.add('fa-bars');
        navtop.classList.remove('slide');
    }
});