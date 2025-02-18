document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".modelosContenedor");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");

    let visibleItems = getVisibleItems(); // Cantidad de elementos visibles en pantalla
    let index = 0; // Índice del primer elemento visible

    // Función para obtener cuántos elementos deben mostrarse
    function getVisibleItems() {
        if (window.innerWidth <= 430) return 1; // Móvil
        if (window.innerWidth <= 769) return 3; // Tablet
        return 4; // Escritorio
    }

    // Función para actualizar el número de elementos visibles al cambiar el tamaño de la pantalla
    window.addEventListener("resize", () => {
        visibleItems = getVisibleItems();
        index = 0; // Reset al inicio para evitar desajustes
        updateCarousel();
    });

    // Evento para botón "siguiente"
    nextBtn.addEventListener("click", function () {
        const totalItems = document.querySelectorAll(".modelo").length;
        if (index + visibleItems < totalItems) {
            index++;
            updateCarousel();
        }
    });

    // Evento para botón "anterior"
    prevBtn.addEventListener("click", function () {
        if (index > 0) {
            index--;
            updateCarousel();
        }
    });

    // Función para actualizar la posición del carrusel
    function updateCarousel() {
        const itemWidth = document.querySelector(".modelo").offsetWidth + 10; // Ancho + margen
        container.style.transform = `translateX(${-index * itemWidth}px)`;
    }
});
