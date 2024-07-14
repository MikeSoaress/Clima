function scrollCarousel(direction) {
    const carousel = document.querySelector('#carrosel');
    const scrollAmount = carousel.clientWidth; // Ajuste para rolar a largura visível do carrossel

    if (direction === 'next') {
        carousel.scrollLeft += scrollAmount;
    } else if (direction === 'prev') {
        carousel.scrollLeft -= scrollAmount;
    }
}