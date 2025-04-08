let slideIndex = 0;

function showSlides() {
    const track = document.querySelector('.slide-track');
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    if (slideIndex >= totalSlides) slideIndex = 0;
    if (slideIndex < 0) slideIndex = totalSlides - 1;

    track.style.transform = `translateX(-${slideIndex * 100}%)`;
}

function plusSlides(n) {
    slideIndex += n;
    showSlides();
}

// Troca automática a cada 4 segundos
setInterval(() => {
    slideIndex++;
    showSlides();
}, 3000);

// Mostra o primeiro slide ao carregar
document.addEventListener("DOMContentLoaded", showSlides);