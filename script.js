AOS.init();

/* scripts.js */
function showSlide(carouselId, index) {
    const carousel = document.getElementById(carouselId);
    const carouselInner = carousel.querySelector('.carousel-inner');
    const slides = carousel.querySelectorAll('.carousel-item');
    const itemsPerSlide = window.innerWidth >= 768 ? 3 : 1;
    const totalSlides = slides.length;

    if (index >= totalSlides) index = 0;
    if (index < 0) index = totalSlides - itemsPerSlide;

    const offset = -index * (100 / itemsPerSlide);
    carouselInner.style.transform = `translateX(${offset}%)`;

    carousel.dataset.currentIndex = index;
}

function nextSlide(carouselId) {
    const carousel = document.getElementById(carouselId);
    const currentIndex = parseInt(carousel.dataset.currentIndex) || 0;
    showSlide(carouselId, currentIndex + (window.innerWidth >= 768 ? 3 : 1));
}

function prevSlide(carouselId) {
    const carousel = document.getElementById(carouselId);
    const currentIndex = parseInt(carousel.dataset.currentIndex) || 0;
    showSlide(carouselId, currentIndex - (window.innerWidth >= 768 ? 3 : 1));
}

// Inicializar carrosséis
document.querySelectorAll('.carousel').forEach(carousel => {
    carousel.dataset.currentIndex = 0;
    showSlide(carousel.id, 0);
});

window.addEventListener('resize', () => {
    document.querySelectorAll('.carousel').forEach(carousel => {
        showSlide(carousel.id, parseInt(carousel.dataset.currentIndex));
    });
});

// Depoimentos
  const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });