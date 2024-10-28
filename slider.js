const slider = document.querySelector('.review-slider');
const slides = document.querySelectorAll('.review-box');
let currentIndex = 0;

document.querySelector('.next-slide').addEventListener('click', () => {
    if (currentIndex < slides.length - 1) {
        currentIndex++;
        slider.style.transform = `translateX(-${currentIndex * (250 + 20)}px)`; // Adjust for margin
    }
});

document.querySelector('.prev-slide').addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        slider.style.transform = `translateX(-${currentIndex * (250 + 20)}px)`; // Adjust for margin
    }
});
