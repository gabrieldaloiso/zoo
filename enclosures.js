document.querySelectorAll(".enclosure-card button").forEach(button => {
    button.addEventListener("click", () => {
        alert("Afficher les détails de l'enclos.");
    });
});

// Fonctionnalité du carrousel
const carousel = document.querySelector('.carousel');
let currentIndex = 0;

function showNextImage() {
    const images = carousel.querySelectorAll('img');
    images[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].classList.add('active');
}

setInterval(showNextImage, 3000);