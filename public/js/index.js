
let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

// script bach kantl3 navbar f screen s4ir mn 760 ltht
menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}
window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

/*  Script bach 4antl3 lform d search

document.querySelector("#search-icon").onclick = () => {
    document.querySelector('#search-form').classList.toggle('active');
}
document.querySelector("#close").onclick = () => {
    document.querySelector('#search-form').classList.remove('active');
}
*/

// ---------------------------- Swiper Script swiper dyal lfoo9
 var swiper = new Swiper(".home-slider", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 7500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        loop: true, // loop true ib9a ithrk bohdo
 });



 // ---------------------------- Swiper Script swiper dyal review fin kaynin coments dyal customers
 var swiper = new Swiper(".review-slider", {
        spaceBetween: 20,
        centeredSlides: true,
        autoplay: {
          delay: 7500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
   loop: true,
   breakpoints: {
     0: {
       slidesPerView:1,
     },
     640: {
       slidesPerView:2,
     },
     780: {
       slidesPerView:2,
     },
     1024: {
       slidesPerView:3,
     },
   }
 });



// Script dloader li4ay4br load
function loader() {
  document.querySelector(".loader-container").classList.add('fade-out');

}

function fadeOut() {
   setInterval(loader, 3000)
}

window.onload = fadeOut;
