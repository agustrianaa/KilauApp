let currentSlide = 0;

function showSlide(slideIndex) {
    const slides = document.querySelectorAll('.slide');
    slides.forEach(slide => {
        slide.style.display = 'none';
    });

    slides[slideIndex].style.display = 'block';
}

function nextSlide() {
    currentSlide++;
    if (currentSlide >= document.querySelectorAll('.slide').length) {
        currentSlide = 0;
    }
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide--;
    if (currentSlide < 0) {
        currentSlide = document.querySelectorAll('.slide').length - 1;
    }
    showSlide(currentSlide);
}

showSlide(currentSlide);
