document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.home-slider', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
    });

    // Smooth scroll for navigation links
    document.querySelectorAll('nav ul li a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
