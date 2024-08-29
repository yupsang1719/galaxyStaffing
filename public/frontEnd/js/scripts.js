document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.home-slider', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
    });
});


//script for director's message

    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll('.scroll-animate');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        elements.forEach(element => {
            observer.observe(element);
        });
    });

//Script for testimonials 
    document.addEventListener("DOMContentLoaded", function() {
        const track = document.querySelector('.testimonial-track');
        const slides = document.querySelectorAll('.testimonial-slide');
        let index = 0;
        const totalSlides = slides.length;

        function cloneSlides() {
            for (let i = 0; i < 3; i++) { // Clone the first three slides
                let clone = slides[i].cloneNode(true);
                track.appendChild(clone);
            }
        }

        function moveSlider() {
            index++;
            track.style.transition = 'transform 0.8s ease-in-out';
            track.style.transform = `translateX(${-index * (100 / 3)}%)`;

            if (index >= totalSlides) {
                setTimeout(() => {
                    track.style.transition = 'none';
                    track.style.transform = 'translateX(0)';
                    index = 0;
                }, 800); // Adjust the timing based on your transition duration
            }
        }

        cloneSlides();
        setInterval(moveSlider, 4000); // Slide every 4 seconds
    });

//Script for employers section 
    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll('.scroll-animate');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        elements.forEach(element => {
            observer.observe(element);
        });
    });

//Script for recruitment process 
    document.addEventListener("DOMContentLoaded", function() {
        const steps = document.querySelectorAll('.step');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('scroll-animate');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        steps.forEach(step => {
            observer.observe(step);
        });
    });

//Script for Employee registration section 
    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll('.registration-content, .register-button, .registration-benefits li');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('scroll-animate');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        elements.forEach(element => {
            observer.observe(element);
        });
    });

//Script for staff area section 
    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll('.staff-resource-heading, .staff-resource-content, .resource-button');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('scroll-animate');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        elements.forEach(element => {
            observer.observe(element);
        });
    });

//Script for menu toggle 
    function toggleMenu() {
        var menu = document.getElementById("nav-menu").querySelector("ul");
        var menuIcon = document.querySelector(".menu-icon");
        var closeIcon = document.querySelector(".close-icon");

        if (menu.style.display === "block") {
            menu.style.display = "none";
            menuIcon.style.display = "block";
            closeIcon.style.display = "none";
        } else {
            menu.style.display = "block";
            menuIcon.style.display = "none";
            closeIcon.style.display = "block";
        }
    }

//Script for popup toggle 
    function togglePopup() {
        var popup = document.getElementById("popup");
        if (popup.style.display === "flex") {
            popup.style.display = "none";
        } else {
            popup.style.display = "flex";
        }
    }

    // Show popup on every page load
    window.onload = function() {
        setTimeout(togglePopup, 5000); // Show the popup after 5 seconds
    }

//Script for scroll animations 
    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll('.scroll-animate');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        elements.forEach(element => {
            observer.observe(element);
        });
    });