//  for navbar button , which we used in responsive

document.querySelector('.navbar-menu-btn').addEventListener('click', () => {
    document.querySelector('.navbar-menu').classList.toggle('show');
});


//  swiper for home screen

var swiper = new Swiper(".home-slider", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 4000, // Set the delay to 3 seconds (3000 milliseconds)
    },
});


// swiper for review part in about page
var swiper = new Swiper(".slide-content", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 3, // Change this value to the number of boxes you want to show at a time
    spaceBetween: 16, // Add some space between the boxes
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
    },
    autoplay: {
        delay: 3000, // Set the delay in milliseconds (e.g., 3000 for 3 seconds)
        disableOnInteraction: false, // Allow interaction (e.g., clicking on slides) to stop autoplay
    },
    breakpoints: {
        1024: {
            slidesPerView: 3,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 16,
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 16,
        },
        0: {
            slidesPerView: 1,
            spaceBetween: 16,
        },
    },
});







